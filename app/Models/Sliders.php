<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    use HasFactory;

    protected $table = 'sliders';
    
    protected $fillable = [
        'title',
        'image',
        'url',
        'order',
        'status'
    ];

    public static $rules = [
        'title' => 'required',
        'image' => 'required',
        'url' => 'required',
        'order'   => 'required',
        'status' => 'required' 
    ];
}
