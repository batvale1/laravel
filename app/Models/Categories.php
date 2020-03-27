<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public $table = 'news_categories';
    protected $fillable = ['id', 'short_desc', 'full_desc', 'active'];

    public function news() {
        return $this->hasMany(News::class, 'cat_id');
    }
}
