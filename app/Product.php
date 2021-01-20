<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    protected $fillable = ['price', 'name', 'status'];

    public function productCategory()
  	{
    	return $this->hasMany('App\ProductCategory', 'product_id');
  	}

    public function scopeActive($query) {
      return $query->where('status', 'active');
    }

    public function scopeDelete($query) {
      return $query->where('status', 'delete');
    }

    public function getCreatedAtAttribute($value){
        return date('d M Y', strtotime($value));
    }

    public function getPriceAttribute($value){
        return  number_format($value,2);
    }

}
