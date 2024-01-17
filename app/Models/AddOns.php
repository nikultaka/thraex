<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddOns extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'addons';
    public $timestamps = false;

    protected $fillable = [
        'id','title','addon_img','addon_description','product_id','created_at','updated_at'
    ];
}
