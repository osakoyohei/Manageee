<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    //テーブル名
    protected $table = 'todos';

    //可変項目
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];
}
