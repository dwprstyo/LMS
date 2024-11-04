<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'homework_id',
        'user_id',
        'file_path',   // Assuming this is the location where the file is stored.
        'submitted_at',
    ];

    public function homework()
    {
        return $this->belongsTo(Homework::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
