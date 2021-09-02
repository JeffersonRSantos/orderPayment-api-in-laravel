<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitation extends Model
{
    protected $table = "solicitation";
    protected $guarded = "id";

    protected $fillable = [
        "id_wepayout",
        "user_id",
        "payment_value",
        "status",
        "status_payment"
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\Users', 'user_id');
    }
}
