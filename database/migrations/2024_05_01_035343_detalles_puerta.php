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
         Schema::create('detalles_puerta', function (Blueprint $table) {
        
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_pedido');
            $table->unsignedBigInteger('id_tipo_funcionamiento');
            $table->unsignedBigInteger('id_tipo_control');
            $table->unsignedBigInteger('id_tipo_puerta');            
            $table->string('marca');
            $table->string('voltaje');
            $table->unsignedBigInteger('id_patin_retractil');  

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
