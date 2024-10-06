<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemUsers extends Model
{
    use HasFactory;

    protected $table = "system_users";
    protected $id = "userID";

    public $fillable = [
        "userID",
        "firstName",
        "middleName",
        "lastName",
        "address",
        "gender",
        "birthDate",
        "phoneNumber",
        "username",
        "password",
        "userType",

    ];
}
