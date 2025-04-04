<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserNotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session()->exists('users')) {
            $user = session()->pull("users");
            session()->put('users', $user);

            if ($user['userType'] != 'user') {
                return redirect("/logout");
            }

            $count = DB::table('notifications')->where('userID', '=', $user['userID'])
                ->where('status', '=', 'unread')
                ->count();
            $data = DB::table('notifications')
                ->where('userID', '=', $user['userID'])
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            return view('user.notifications', ['notifs' => $count, 'all' => $data]);
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

            if ($request->btnMarkAsRead) {
                $id = $request->btnMarkAsRead;
                $updateCount = DB::table('notifications')->where('id', '=', $id)->update([
                    "status" => "read"
                ]);
                if ($updateCount > 0) {
                    session()->put("successUpdateNotif", true);
                } else {
                    session()->put("errorUpdateNotif", true);
                }
            }

            return redirect("/notifications");
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
                $deleteCount = DB::table('notifications')->where('id', '=', $id)->delete();
                if ($deleteCount > 0) {
                    session()->put("successDeleteNotif", true);
                } else {
                    session()->put("errorDeleteNotif", true);
                }
            }

            return redirect("/notifications");
        }
        return redirect("/");
    }
}
