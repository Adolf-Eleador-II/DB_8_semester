<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;
    public function posts(){
        return $this->belongsToMany(Post::class, 'post_tag', 'id_tag', 'id_post');
    }
    public function tag(){
        return $this->belongsTo(Tag::class, 'id_parent');
    }
    public function tags(){
        return $this->hasMany(tag::class, 'id_parent');
    }
}

