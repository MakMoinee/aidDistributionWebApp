<?php

namespace App\Http\Controllers;

use App\Models\Aids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


            return view('user.aids', ['aids' => $aids, 'donation' => $finalDonation, 'all' => $newDonations]);
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
}
