<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncomiendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encomiendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_horario')
                ->nullable()
                ->references('id')
                ->on('horarios')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('id_emisor')
                ->nullable()
                ->references('id')
                ->on('clientes')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('id_receptor')
                ->nullable()
                ->references('id')
                ->on('clientes')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->date('Fecha_Env');
            $table->date('Fecha_Rec');
            $table->enum('Estado', ['Enviado', 'Recepcionado', 'Entregado'])->default('Enviado');
            $table->float('PrecioTotal',8,2);
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
        Schema::dropIfExists('encomiendas');
    }
}
