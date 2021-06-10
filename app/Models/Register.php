<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    //テーブル名
    protected $table = 'users';

    //可変項目
    protected $fillable = [
        'name',
        'email',
        'password'
    ];
}
