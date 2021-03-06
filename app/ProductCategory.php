<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //
    protected $table = 'product_category';
    public $timestamps = false;

    protected $fillable = ['product_id', 'category_id'];

    public function product()
	{
	    return $this->belongsTo('App\Product');
	}

	public function category()
	{
	    return $this->belongsTo('App\Category');
	}

}
