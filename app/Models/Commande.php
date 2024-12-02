<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'article_id', 
        'quantite',
        'status',
    ];

    
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}

