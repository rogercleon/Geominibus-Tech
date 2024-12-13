<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignarMinibusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignar_minibuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_minibus')
                ->nullable()
                ->references('id')
                ->on('minibuses')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('id_conductor')
                ->nullable()
                ->references('id')
                ->on('conductores')
                ->cascadeOnUpdate()
                ->nullOnDelete();
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
        Schema::dropIfExists('asignar_minibuses');
    }
}
