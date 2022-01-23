<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

     //テーブル名
     protected $table = 'tags';

     //可変項目
     protected $fillable = [
         'tag_name',
     ];

    public function todos()
    {
        return $this->belongsToMany(Todo::class);
    }
}
