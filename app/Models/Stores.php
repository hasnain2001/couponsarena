<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    use HasFactory;
    protected $table = 'stores';
    protected $fillable = [
        'name',
        'slug',
        'top_store',
        'description',
        'url',
        'destination_url',
        'category',
        'top_store',
        'title',
        'meta_tag',
        'meta_keyword',
        'meta_description',
        'status',
        'authentication',
        'network',
        'store_image',
    ];

// Store Model
public function category()
{
    return $this->belongsTo(Categories::class);
}
public function coupons() {
    return $this->hasMany(Coupons::class);
}


}
