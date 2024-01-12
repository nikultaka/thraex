<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'product_details';
    public $timestamps = false;

    protected $fillable = [
        'id','title','sub_title','banner_img','banner_description','product_id','created_at','updated_at'
    ];
}
