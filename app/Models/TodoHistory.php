<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\Node\FunctionNode;
use Kyslik\ColumnSortable\Sortable;

class TodoHistory extends Model
{
    use HasFactory;
    use Sortable;

    //テーブル名
    protected $table = 'todo_histories';

    //可変項目
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'category_id',
        'todo_created_at',
    ];

    // DateTime型に変換
    protected $dates = ['todo_created_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
