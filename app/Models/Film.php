<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = ['title','description','year','embed_url'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
