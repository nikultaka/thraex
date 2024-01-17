<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'materials';
    public $timestamps = false;

    protected $fillable = [
        'id','title','material_img','material_description','product_id','created_at','updated_at'
    ];
}
