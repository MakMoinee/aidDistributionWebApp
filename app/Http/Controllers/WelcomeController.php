<?php

namespace App\Http\Controllers;

use App\Models\SystemUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome');
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
        if ($request->btnCreateAccount) {
            if ($request->password == $request->confirmpass) {
                session()->put("errorPasswordNotMatch", true);
                return redirect("/");
            }
            $query = json_decode(DB::table('system_users')->where('username', '=', $request->username)->get(), true);
            if (count($query) > 0) {
                session()->put("existingUsername", true);
            } else {
                $users = new SystemUsers();
                $users->firstName = $request->firstName;
                $users->middleName = $request->middleName;
                $users->lastName = $request->lastName;
                $users->address = $request->address;
                $users->gender = $request->gender;
                $users->birthDate = $request->birthDate;
                $users->phoneNumber = $request->phoneNumber;
                $users->username = $request->username;
                $users->userType = "user";
                $users->password = Hash::make($request->password);
                $isSave = $users->save();
                if ($isSave) {
                    session()->put("successCreateAccount", true);
                } else {
                    session()->put("errorCreateAccount", true);
                }
            }
        } else if ($request->btnLogin) {
            $queryResult = DB::table('system_users')->where('username', '=', $request->username)->get();
            if ($queryResult->count() > 0) {
                $user = array();
                foreach ($queryResult as $q) {
                    if (password_verify($request->password, $q->password)) {
                        $user = json_decode(json_encode($q), true);
                    }
                }
                if (count($user) > 0) {

                    if ($user['userType'] == 'user') {
                        session()->put("successLogin", true);
                        session()->put("users", $user);
                        return redirect('/user_home');
                    } else {
                        session()->put("unauthorizedLogin", true);
                    }
                } else {
                    session()->put("errorLogin", true);
                }
            }else{
                session()->put("wrongUsernameOrPass", true);
            }
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
