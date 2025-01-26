<?php

namespace App\Http\Controllers;

use App\Models\Aids;
use App\Models\DoneDonation;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class UserAidsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session()->exists('users')) {
            $user = session()->pull("users");
            session()->put('users', $user);

            $aids = DB::table('aids')
                ->where('userID', '=', $user['userID'])
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $finalDonation = array();
            $donations = json_decode(DB::table('vwtotalreceives')->get(), true);
            foreach ($donations as $d) {
                $finalDonation[$d['aidID']] = $d['total'];
            }

            $allDonations = json_decode(DB::table('vwgiverdonation')->where('ownerID', '=', $user['userID'])->orderBy('created_at', 'desc')->limit(3)->get(), true);
            $newDonations = array();
            foreach ($allDonations as $a) {
                if (array_key_exists($a['aidID'], $newDonations)) {
                    $tmpVal =  $newDonations[$a['aidID']];
                    array_push($tmpVal, $a);
                    $newDonations[$a['aidID']] = $tmpVal;
                } else {
                    $tmpVal = array();
                    array_push($tmpVal, $a);
                    $newDonations[$a['aidID']] = $tmpVal;
                }
            }
            // dd($newDonations);

            $query = json_decode(DB::table('done_donations')->where('userID', '=', $user['userID'])->get(), true);
            $allDone = array();
            foreach ($query as $q) {
                $allDone[$q["aidID"]] = $q;
            }


            return view('user.aids', ['aids' => $aids, 'donation' => $finalDonation, 'all' => $newDonations, 'finish' => $allDone]);
        }
        return redirect("/");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (session()->exists('users')) {
            $user = session()->pull("users");
            session()->put('users', $user);

            if ($user['userType'] != 'user') {
                return redirect("/logout");
            }

            if ($request->btnAddRequest) {
                if ($request->amount > 0) {

                    $newAids = new Aids();
                    $newAids->userID = $user['userID'];
                    $newAids->name = $request->requestName;
                    $newAids->purpose = $request->purpose;
                    $newAids->amount = $request->amount;
                    $newAids->paymentAddress = $request->paymentAddress;
                    $newAids->letter = $request->letter;

                    $response = $this->callApi($newAids->letter);
                    $priorityLevel = "";
                    $score = $response['urgency_score'] * 100;
                    if ($score > 97) {
                        $priorityLevel = "P1";
                    } else if ($score > 95 && $score < 97) {
                        $priorityLevel = "P2";
                    } else if ($score > 90 && $score < 95) {
                        $priorityLevel = "P3";
                    } else {
                        $priorityLevel = "P4";
                    }

                    $newAids->category = $response['category'];
                    $newAids->priority = $priorityLevel;

                    $isSave = $newAids->save();
                    if ($isSave) {
                        session()->put("addRequestSuccess", true);
                    } else {
                        session()->put("errorAddRequest", true);
                    }
                } else {
                    session()->put("errorAddRequestAmount", true);
                }
            }

            return redirect("/user_aids");
        }
        return redirect("/");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        if (session()->exists('users')) {
            $user = session()->pull("users");
            session()->put('users', $user);

            if ($user['userType'] != 'user') {
                return redirect("/logout");
            }

            $success = $request->query('success');
            if ($success == true || $success == "true") {
                $newDone = new DoneDonation();
                $newDone->userID = $user['userID'];
                $newDone->aidID = $id;
                $isSave = $newDone->save();
                if ($isSave) {
                    session()->put("successFundTransfers", true);
                } else {
                    session()->put("errorFundTransfer", true);
                }
            } else {
                session()->put("errorFundTransfer", true);
            }
            return redirect("/user_aids");
        }
        return redirect("/");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        if (session()->exists('users')) {
            $user = session()->pull("users");
            session()->put('users', $user);

            if ($user['userType'] != 'user') {
                return redirect("/logout");
            }
            if ($request->btnDeleteRequest) {
                $deleteCount = DB::table('aids')->where('aidId', '=', $id)->delete();
                if ($deleteCount > 0) {
                    session()->put('successDeleteRequest', true);
                } else {
                    session()->put('errorDeleteRequest', true);
                }
            }
            return redirect("/user_aids");
        }
        return redirect("/");
    }

    public function receiveFunds(Request $request)
    {
        if (session()->exists('users')) {
            $user = session()->pull("users");
            session()->put('users', $user);

            if ($user['userType'] != 'user') {
                return redirect("/");
            }

            // Validate request data
            $request->validate([
                'aidID' => 'required|integer',
                'amount' => 'required|integer',
                'paymentAddress' => 'required|string',
            ]);

            $aidID = $request->input('aidID');
            $amount = $request->input('amount');
            $paymentAddress = $request->input('paymentAddress');
            $uuid = "d8cf7845-403b-40fb-a7cd-0bdbdda43b69"; // Set UUID

            // Create the command to run the Node.js script
            $process = new Process([
                'node',
                base_path('../../../node_scripts/receiveFunds.js'), // Path to your Node.js script
                $aidID,
                $amount,
                $uuid,
                $paymentAddress
            ]);

            // Execute the Node.js script
            $process->run();

            // Check for errors
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
                session()->put("errorReceive", true);
            } else {
                session()->put("successReceive", true);
            }

            // Return success message
            return redirect("/user_aids");
        }
        return redirect("/");
    }

    private function callApi(string $msg): array
    {
        $client = new Client();
        $data = array();
        try {
            $response = $client->post('http://localhost:5000/process_request', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'json' => ['message' => $msg] // Send as JSON
            ]);

            // Debug the response
            $data = json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            dd([
                'error' => $e->getMessage(),
                'response' => $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : null
            ]);
        } finally {
            return $data;
        }
    }
}
