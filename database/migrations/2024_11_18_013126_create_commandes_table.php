<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('commandes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('article_id')->constrained('articles')->onDelete('cascade');
        $table->integer('quantite');
        $table->string('status')->default('en cours');
        $table->timestamps();
    });
    
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
