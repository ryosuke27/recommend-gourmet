<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'map_id',
    ];

    /**
     * UserFavoriteへのリレーション.
     */
    public function userFavorites()
    {
        return $this->hasMany(UserFavorite::class, 'dish_id');
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'user_favorites')->withTimestamps();
    }

    public function store()
    {
        return $this->hasOne(Store::class, 'id', 'store_id');
    }
}
