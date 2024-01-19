<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutCms extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'about_cms';
    public $timestamps = false;

    protected $fillable = [
        'id','about_section','created_at','updated_at'
    ];
}
