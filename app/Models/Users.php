<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
    protected $guarded = "id";

    protected $fillable = [
        "invoice",
        "name",
        "cod_bank",
        "number_account",
        "number_agency",
        "payment_value"
    ];

}