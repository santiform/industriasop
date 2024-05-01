<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('pedidos', function (Blueprint $table) {
        
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_tipo_funcionamiento');
            $table->unsignedBigInteger('id_tipo_control');
            $table->unsignedBigInteger('id_tipo_puerta');
            $table->unsignedBigInteger('id_acceso');
            $table->string('nombre');
            $table->string('email');
            $table->string('telefono');
            $table->string('direccion_obra');

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
