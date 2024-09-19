<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'clicks',
        'order',
        'description',
        'code',
        'sort',
        'destination_url',
        'ending_date',
        'status',
        'authentication',
        'store',

    ];

}
