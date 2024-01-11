<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubProducts extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'sub_products';
    public $timestamps = false;

    protected $fillable = [
        'id','subproduct_name','product_id','created_at','updated_at'
    ];
}
