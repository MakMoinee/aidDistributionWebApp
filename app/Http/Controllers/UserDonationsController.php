<?php

namespace App\Http\Controllers;

use App\Models\DonationDetails;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

            $certificate = array();

            $allDetails = DB::table('donation_details')
                ->where('userID', '=', $user['userID'])
                ->get()
                ->toArray();

            $detail = array();

            try {
                foreach ($allDetails as $d) {
                    $aidID = $d->aidID;
                    $amount = $d->amount;

                    if (!isset($detail[$aidID])) {
                        $detail[$aidID] = 0;
                        $certificate[$aidID] = 0;
                    }
                    $detail[$aidID] += $amount;
                    $certificate[$aidID] += $amount;
                }
            } catch (Exception $e) {
                // Log the error if necessary
            }





            return view('user.donations', ['aids' => $aids, 'currentUser' => $user, 'allDetail' => $detail, 'uid' => $user['userID'], 'certificate' => $certificate]);
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
}
