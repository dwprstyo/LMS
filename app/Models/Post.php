<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'class_id',
        'content',    // Assuming there's a column to hold post content.
        'created_by',
        'timestamp',
    ];

    public function classSubject()
    {
        return $this->belongsTo(ClassSubject::class, 'class_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
