<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'store_id',
        'evaluation',
        'comment'
    ];

    public function store(){
        return $this->belongsTo('App\Models\Store');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
