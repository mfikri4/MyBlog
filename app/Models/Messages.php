<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;

    protected $table = 'messages';
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'status'
    ];

    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'subject' => 'required',
        'message'   => 'required',
        'status' => 'required' 
    ];
}
