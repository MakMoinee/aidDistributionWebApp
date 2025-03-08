<?php

namespace App\Http\Controllers;

use App\Models\DonationDetails;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class UserDonationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session()->exists('users')) {
            $user = session()->pull("users");
            session()->put('users', $user);

            $aids = DB::table('vwdonations')
                ->where('userID', '<>', $user['userID'])
                ->orderBy('created_at', 'desc')
                ->paginate(10);



            $allDetails = DB::table('donation_details')
                ->where('userID', '=', $user['userID'])
                ->get()
                ->toArray();

            $detail = array();

            $phpRate = $this->getEthToPhpRate();

            try {
                foreach ($allDetails as $d) {
                    $aidID = $d->aidID;
                    $amount = $d->amount;

                    if (!isset($detail[$aidID])) {
                        $detail[$aidID] = 0;
                    }
                    $detail[$aidID] += $amount;
                }
            } catch (Exception $e) {
                // Log the error if necessary
            }

            // dd($aids);

            $pDetails = json_decode(DB::table('personal_details')->where('userID', '<>', $user['userID'])->get(), true);


            return view('user.donations', ['details' => $pDetails, 'aids' => $aids, 'currentUser' => $user, 'allDetail' => $detail, 'phpRate' => $phpRate]);
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

            if ($user['userType'] != "user") {
                return redirect("/");
            }

            if ($request->btnAddDonation) {
                $newDonation = new DonationDetails();
                $newDonation->userID = $user['userID'];
                $newDonation->hash = $request->thash;
                $newDonation->from = $request->tfrom;
                $newDonation->to = $request->tto;
                $newDonation->eth = $request->eth;
                $newDonation->amount = $request->amount;
                $newDonation->aidID = $request->aidID;

                $isSave = $newDonation->save();
                if ($isSave) {
                    session()->put("successAddDonation", true);
                } else {
                    session()->put("errorAddDonation", true);
                }
            }

            return redirect("/user_donations");
        }
        return redirect("/");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }

    function getEthToPhpRate()
    {
        $response = Http::get('https://api.coingecko.com/api/v3/simple/price', [
            'ids' => 'ethereum',
            'vs_currencies' => 'php'
        ]);

        if ($response->successful()) {
            return $response->json()['ethereum']['php'];
        }

        return null; // Handle API failure
    }
}
