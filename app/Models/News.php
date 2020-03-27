<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['id', 'short_desc', 'full_desc', 'active', 'cat_id'];

    public function category() {
        return $this->belongsTo(Categories::class, 'cat_id');
    }
}
