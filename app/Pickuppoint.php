<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pickuppoint extends Model
{
    protected $table = 'pickup_point';
    protected $fillable = [
        'pickup_point_name','pickup_point_address','pickup_point_phone','pickup_point_phone_two'
    ];
}
