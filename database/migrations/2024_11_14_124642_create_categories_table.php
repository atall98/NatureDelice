<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_categories_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Exécuter la migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();  
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Inverser la migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}

