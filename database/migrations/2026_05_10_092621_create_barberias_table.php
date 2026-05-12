<?php

use Illuminate\Database\Migrations\Migration; //Migration permite que este archivo sea una migración.
use Illuminate\Database\Schema\Blueprint; //Blueprint permite definir columnas de una tabla.
use Illuminate\Support\Facades\Schema; //Schema permite crear, modificar o borrar tablas.

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void //Porque up() significa: aplicar cambios a la base de datos
    {
        Schema::create('barberias', function (Blueprint $table) {

            $table->id();
            $table->string('nombre', 30);
            $table->string('descripcion', 200);
            $table->string('ciudad', 30);
            $table->string('direccion', 30);
            $table->string('codigo_postal', 10);
            $table->string('telefono', 20);
            $table->string('imagen', 20);
            $table->time('horario_apertura');
            $table->time('horario_cierre');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barberias');
    }
};
