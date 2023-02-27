<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'subcategory_name','subcat_slug','category_id'
    ];

    public function category(){
    	return $this->belongsTo(Category::class);
    }
}
