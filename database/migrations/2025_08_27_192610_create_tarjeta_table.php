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
        Schema::create('tarjeta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cuenta_id')->constrained('cuenta')->onDelete('cascade');
            $table->string('numero_tarjeta');
            $table->string('cvc_tarjeta');
            $table->integer('monto_tarjeta');
            $table->string('BIC_tarjeta');
            $table->string('pin_tarjeta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarjeta');
    }
};
