<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop',
        'area_id',
        'genre_id',
        'image',
        'content'
    ];

    public function reservations(){
        return $this->hasMany('App\Models\Reservation');
    }

    public function favorites(){
        return $this->hasMany('App\Models\Favorite');
    }

    public function area(){
        return $this->belongsTo('App\Models\Area');
    }
    public function genre(){
        return $this->belongsTo('App\Models\Genre');
    }
}
