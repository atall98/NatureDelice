<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_articles_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Exécuter la migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // ID principal (bigint unsigned auto-increment)
            $table->string('titre'); // Titre de l'article
            $table->string('image'); // Image de l'article
            $table->float('prix'); // Prix de l'article
            $table->text('description'); // Description de l'article
            $table->foreignId('categorie_id')->constrained()->onDelete('cascade'); // Clé étrangère vers la table 'categories'
            $table->timestamps(); // Created at & Updated at
        });
    }

    /**
     * Inverser la migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles'); // Supprime la table 'articles' si elle existe
    }
}

