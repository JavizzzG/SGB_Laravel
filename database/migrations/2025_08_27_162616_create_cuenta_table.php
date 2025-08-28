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
        Schema::create('cuenta', function (Blueprint $table) {
            $table->id();
            $table->string('cedula_cuenta');
            $table->string('nombre_cuenta');
            $table->string('telefono_cuenta');
            $table->date('nacimiento_cuenta');
            $table->tinyInteger('estado_cuenta'); //1: activo, 0: inactivo
            $table->integer('monto_cuenta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuenta');
    }
};
