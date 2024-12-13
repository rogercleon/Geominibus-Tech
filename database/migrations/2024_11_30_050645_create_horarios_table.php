<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_ruta')
                ->nullable()
                ->references('id')
                ->on('rutas')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('id_minibus')
                ->nullable()
                ->references('id')
                ->on('asignar_minibuses')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->date('Fecha');
            $table->string('Hora');
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
        Schema::dropIfExists('horarios');
    }
}
