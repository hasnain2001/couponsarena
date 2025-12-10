<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    use HasFactory;

    protected $table = 'coupons';

    protected $fillable = [
        'language_id',
        'name',
        'clicks',
        'order',
        'description',
        'code',
        'sort',
        'destination_url',
        'top_coupons',
        'ending_date',
        'status',
        'authentication',
        'store_id',

    ];
    protected $casts = [
        'ending_date' => 'datetime',
    ];

        public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
            public function stores()
    {
        return $this->belongsTo(Stores::class, 'store_id');
    }
}
