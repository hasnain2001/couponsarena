<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'meta_tag',
        'meta_keyword',
        'meta_description',
        'status',
        'authentication',
        'category_image',
    ];

        // Category Model
public function stores()
{
    return $this->hasMany(Stores::class); // Assuming a category has many stores
}

}
