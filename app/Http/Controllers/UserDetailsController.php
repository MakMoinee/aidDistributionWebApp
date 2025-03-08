<?php

namespace App\Http\Controllers;

use App\Models\PersonalDetails;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UserDetailsController extends Controller
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
            $myData = json_decode(DB::table('personal_details')->where('userID', '=', $user['userID'])->get(), true);

            return view('user.details', ['details' => count($myData) > 0 ? $myData : []]);
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

            if ($request->btnSaveDetails) {
                $count = DB::table('personal_details')->where('firstName', '=', $request->firstName)->where('firstName', '=', $request->middleName)->where('firstName', '=', $request->lastName)->where('userID', "=", $user['userID'])->count();
                $files = $request->file('documents');
                $fileName = "";
                if ($files) {
                    $mimeType = $files->getMimeType();
                    if ($mimeType == "application/pdf") {
                        $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/data/userDetails';
                        $fileName = strtotime(now()) . "." . $files->getClientOriginalExtension();
                        $isFile = $files->move($destinationPath,  $fileName);
                        chmod($destinationPath, 0755);

                        if ($count > 0) {
                            $updateCount = DB::table('personal_details')->where('userID', '=', $user['userID'])->update([
                                "firstName" => $request->firstName,
                                "middleName" => $request->middleName,
                                "lastName" => $request->lastName,
                                "address" => $request->address,
                                "birthDate" => $request->birthDate,
                                "contactNumber" => $request->contactNumber,
                                "documents" => '/data/userDetails/' . $fileName,
                            ]);
                            if ($updateCount > 0) {
                                session()->put("successDetails", true);
                            } else {
                                session()->put("errorDetails", true);
                                try {
                                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/data/userDetails/' . $fileName;
                                    File::delete($destinationPath);
                                } catch (Exception $e1) {
                                }
                            }
                        } else {
                            $newDetails = new PersonalDetails();
                            $newDetails->userID = $user['userID'];
                            $newDetails->firstName = $request->firstName;
                            $newDetails->middleName = $request->middleName;
                            $newDetails->lastName = $request->lastName;
                            $newDetails->address = $request->address;
                            $newDetails->birthDate = $request->birthDate;
                            $newDetails->status = "not approved";
                            $newDetails->contactNumber = $request->contactNumber;
                            $newDetails->documents = '/data/userDetails/' . $fileName;
                            $isSave = $newDetails->save();
                            if ($isSave) {
                                session()->put("successDetails", true);
                            } else {
                                session()->put("errorDetails", true);
                                try {
                                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/data/userDetails/' . $fileName;
                                    File::delete($destinationPath);
                                } catch (Exception $e1) {
                                }
                            }
                        }
                    } else {
                        session()->put("errorMimeType", true);
                    }
                } else {
                    session()->put("errorFileRequired", true);
                }
            }
            return redirect("/user_details");
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
