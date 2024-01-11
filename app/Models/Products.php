<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'products';
    public $timestamps = false;

    protected $fillable = [
        'id','product_name','status','created_at','updated_at'
    ];
}
