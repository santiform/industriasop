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
         Schema::create('tipos_control', function (Blueprint $table) {
        
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_tipo_funcionamiento');
            $table->string('nombre');
            $table->string('marca');
            $table->string('voltaje');
            $table->string('potencia');
            $table->string('encoder');
            $table->boolean('rescate');

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