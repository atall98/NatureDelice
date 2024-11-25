<?php

// app/Models/Categorie.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    // Les attributs qui peuvent être massivement assignés
    protected $fillable = ['name'];

    /**
     * Relation avec le modèle Article
     * Une catégorie peut avoir plusieurs articles.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}

