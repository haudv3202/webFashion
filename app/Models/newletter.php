<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newletter extends Model
{
    use HasFactory;
    protected $fillable = ['image_url_newletter','des_newleter','status','created_at','updated_at'];
}
