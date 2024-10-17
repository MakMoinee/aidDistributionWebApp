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

            return view('user.aids', ['aids' => $aids]);
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
    public function destroy(string $id)
    {
        //
    }
}
