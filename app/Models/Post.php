<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function comments(){
        return $this->hasMany(Comment::class, 'id_post');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tag', 'id_post', 'id_tag');
    }
}
