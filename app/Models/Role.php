<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

     // Define fillable properties to allow mass assignment
     protected $fillable = ['role_name'];
 
     // Define the relationship with users
     public function users()
     {
         return $this->hasMany(User::class);
     }
}
