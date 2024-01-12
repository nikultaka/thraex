<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTechnology extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'product_technology';
    public $timestamps = false;

    protected $fillable = [
        'id','title','tec_img','tec_description','product_id','created_at','updated_at'
    ];
}
