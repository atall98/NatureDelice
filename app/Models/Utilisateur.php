<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Utilisateur extends Model
{
    use HasFactory;

    // Allow mass assignment for the 'nom', 'email', and 'password' attributes
    protected $fillable = ['nom', 'email', 'password'];

    // Optionally, you can hide sensitive fields from arrays or JSON responses
    protected $hidden = ['password'];
}
