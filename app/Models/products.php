<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class products extends Model
{
    use HasFactory;
    protected $fillable = ['name','images','price','discount_price','view','like','status','category_id','brand_id','created_at','updated_at','deleted_at','image_avatar'];
    public function categories()
    {
        return $this->hasMany(categories::class,'id','category_id');
    }

    public function brand()
    {
        return $this->hasMany(brands::class,'id','brand_id');
    }
}
