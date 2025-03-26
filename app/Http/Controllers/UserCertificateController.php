<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (session()->exists('users')) {
            $user = session()->pull("users");
            session()->put('users', $user);
        }

        $id = $request->query("id");
        $uid = $request->query("uid");
        $amount = $request->query("amount");
        
        if ($id && $amount) {
            $data = json_decode(DB::table('vwgiverdonation')->where("giverID", "=", $uid)->where('aidID', '=', $id)->get(), true);
            if (count($data) > 0) {
                return view('user.certificate', ['data' => $data[0], 'amount' => $amount]);
            } else {
                return redirect("/");
            }
        } else {
            return redirect("/");
        }
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
        //
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
