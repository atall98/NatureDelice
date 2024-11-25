<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'image',
        'categorie_id',
        'prix',
        'description',
    ];

    // Relation avec le modèle Categorie
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    // Accessor pour générer l'URL de l'image
    public function getImageUrlAttribute()
    {
        return asset('storage/images/articles/' . $this->image); // Génère une URL complète
    }
}


