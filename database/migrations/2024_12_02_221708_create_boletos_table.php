<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_horario')
                ->nullable()
                ->references('id')
                ->on('horarios')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('id_cliente')
                ->nullable()
                ->references('id')
                ->on('clientes')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->integer('Asiento');
            $table->float('Precio',8,2);
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
        Schema::dropIfExists('boletos');
    }
}
