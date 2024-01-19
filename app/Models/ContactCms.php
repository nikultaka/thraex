<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactCms extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'contact_cms';
    public $timestamps = false;

    protected $fillable = [
        'id','address','phone','email','website','created_at','updated_at'
    ];
}
