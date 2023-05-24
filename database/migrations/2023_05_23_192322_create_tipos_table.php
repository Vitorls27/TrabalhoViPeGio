<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo', function (Blueprint $table) {
            $table->id();
            $table->string('nome',8);
            $table->timestamps();
        });

        Schema::disableForeignKeyConstraints();

        Schema::table('cardapio', function (Blueprint $table) {
            $table->foreignId('tipo_id')->nullable()->constrained('tipo')->default(null);

        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo');
    }
};
