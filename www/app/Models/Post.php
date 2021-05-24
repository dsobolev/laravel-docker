<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    protected $fillable = [
        'user_id',
        'title',
        'content'
    ];

    public function setUpdatedAt($value)
    {
        return NULL;
    }

    public function author() {
    
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags() {
    
        return $this->belongsToMany(Tag::class);
    }
}
