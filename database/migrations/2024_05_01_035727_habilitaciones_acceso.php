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
        //
         Schema::create('habilitaciones_acceso', function (Blueprint $table) {
        
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_pedido');
            $table->string('parada');
            $table->boolean('salida_a');
            $table->boolean('salida_b');

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
