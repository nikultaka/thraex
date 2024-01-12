<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnologySubDetails extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'technoloy_sub_details';
    public $timestamps = false;

    protected $fillable = [
        'id','title','tec_description','product_id','created_at','updated_at'
    ];
}
