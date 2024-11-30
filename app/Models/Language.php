<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Language extends Model
{
    use HasFactory;
    

    protected $table = 'language';
    protected $fillable = [
        'language_image',
        'name',
        'code',
        
       ];
    
    
    /**
     * Get all of the stores for the Language
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stores():HasMany
    {
        return $this->hasMany(Stores::class, 'language_id', 'id');
    }
    /**
     * Get all of the coupons for the Language
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function coupons(): HasMany
    {
        return $this->hasMany(Coupons::class, 'language_id', 'id');
    }
}
