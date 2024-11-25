<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('commandes', function (Blueprint $table) {
        $table->string('session_id')->nullable()->after('id'); // Ajouter la colonne après 'id'
    });
}

public function down()
{
    Schema::table('commandes', function (Blueprint $table) {
        $table->dropColumn('session_id'); // Supprimer la colonne si la migration est annulée
    });
}

};
