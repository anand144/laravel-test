<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';

    protected $fillable = ['parent_id', 'name','status'];

    protected $casts = [
       'parent_id' => 'json'
    ];

   
    public function product()
    {
      return $this->hasMany('App\ProductCategory', 'category_id');
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

}
