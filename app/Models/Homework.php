<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'class_id',
        'homework',    // Assuming there's a text column to describe the homework.
        'created_by',
    ];

    public function classSubject()
    {
        return $this->belongsTo(ClassSubject::class, 'class_id');
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
