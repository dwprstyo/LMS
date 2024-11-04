<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_name',
        'created_by',
        'is_active',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'class_id');
    }

    public function homework()
    {
        return $this->hasMany(Homework::class, 'class_id');
    }

    public function materials()
    {
        return $this->hasMany(Material::class, 'class_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
