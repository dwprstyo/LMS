<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'class_id',
        'content',     // Assuming there's a column for the material content.
        'created_by',
    ];

    public function classSubject()
    {
        return $this->belongsTo(ClassSubject::class, 'class_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
