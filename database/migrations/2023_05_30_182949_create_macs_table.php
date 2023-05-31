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
        Schema::create('mac', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->integer('contador');
            $table->timestamps();
        });

        Schema::disableForeignKeyConstraints();

        Schema::table('leitura', function (Blueprint $table) {
            $table->foreignId('mac_id')->nullable()->constrained('mac')->default(null);
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
        Schema::dropIfExists('mac');
    }
};
