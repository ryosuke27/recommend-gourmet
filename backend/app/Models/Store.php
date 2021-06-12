<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dish;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'detail',
        'map_url',
    ];

    /**
     * UserFavoriteへのリレーション
     */
    public function dishes()
    {
        return $this->hasMany(Dish::class, "store_id");
    }
}
