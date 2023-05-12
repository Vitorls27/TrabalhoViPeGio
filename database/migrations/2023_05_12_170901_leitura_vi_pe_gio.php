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
        Schema::disableForeignKeyConstraints();

        Schema::create('leituravipegio', function (Blueprint $table){
            $table->id();
            $table->date('date_leitura');
            $table->string('hora_leitura',30);
            $table->string('valor_sensor',20);
            $table->foreignId('sensorViPeGio_id')->nullable()->constrained('sensorViPeGio')->default(null);
            $table->foreignId('mac_id')->nullable()->constrained('mac')->default(null);
            $table->timestamps();
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
        //
    }
};
