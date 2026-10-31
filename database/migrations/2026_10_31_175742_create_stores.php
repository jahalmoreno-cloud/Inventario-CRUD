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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre_Tienda', 100);
            $table->string('Direccion', 200);
            $table->integer('Telefono')->nullable();
            $table->string('slug', 100)->unique();
            $table->string('Email', 100)->nullable();
            $table->boolean('Estado_Activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
