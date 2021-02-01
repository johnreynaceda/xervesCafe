<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo('App\Models\Catergory');
    }
    public function image(){
        return $this->morphOne('App\Models\Image','imageable');
    }
    public function transaction(){
        return $this->hasOne('App\Models\Transaction');
    }
}
