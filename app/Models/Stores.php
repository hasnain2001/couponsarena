<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'top_store',
        'description',
        'url',
        'destination_url',
        'category',
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

}