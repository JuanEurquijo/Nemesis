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
        Schema::create('dosages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicine_id');
            $table->string('type',20);
            $table->string('average_dose',50)->nullable();
            $table->string('minimum_dose',50)->nullable();
            $table->string('maximum_dose',50)->nullable();
            $table->string('unique_dose',50)->nullable();
            $table->timestamps();

            $table->foreign('medicine_id')
            ->references('id')->on('medicines')
            ->onUpdate('cascade')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosages');
    }
};
