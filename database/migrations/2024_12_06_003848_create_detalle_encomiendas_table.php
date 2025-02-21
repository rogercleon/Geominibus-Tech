<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleEncomiendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_encomiendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_encomienda')
                ->nullable()
                ->references('id')
                ->on('encomiendas')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('Descripcion');
            $table->integer('Cantidad');
            $table->integer('Peso');
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
        Schema::dropIfExists('detalle_encomiendas');
    }
}
