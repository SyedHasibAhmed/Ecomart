<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;


class Review extends Model
{
    protected $fillable = ['user_id','product_id','review','rating','review_date','review_month','review_year'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
