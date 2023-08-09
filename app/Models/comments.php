<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $fillable = ['content','product_id','user_id','status','created_at'];
    public function products()
    {
        return $this->hasMany(products::class,'id','product_id');
    }

    public function users()
    {
        return $this->hasMany(User::class,'id','user_id');
    }

}
