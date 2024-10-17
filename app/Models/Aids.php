<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aids extends Model
{
    use HasFactory;

    protected $table = "aids";
    protected $id = "aidId";

    public $fillable = [
        "aidId",
        "userID",
        "name",
        "purpose",
        "amount",
        "paymentAddress",
        "letter",

    ];
}
