<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Childcategory extends Model
{
    protected $fillable = [
        'category_id', 'subcategory_id', 'childcategory_slug', 'childcategory_name'
    ];
}
