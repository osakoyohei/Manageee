<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Todo extends Model
{
    use HasFactory;
    use Sortable;

    //テーブル名
    protected $table = 'todos';

    //可変項目
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'category_id',
    ];

    // ソート
    public $sortable = [
        'created_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
