<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoreosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoreos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_minibus')
                ->nullable()
                ->references('id')
                ->on('minibuses')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->decimal('Latitud', 10, 8);
            $table->decimal('Longitud', 11, 8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monitoreos');
    }
}
