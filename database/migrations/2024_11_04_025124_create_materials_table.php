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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('material_name');
            $table->foreignId('class_id')
                ->nullable()
                ->constrained('class_subjects') // Corrected table name
                ->onDelete('set null')
                ->index()
                ->name('materials_class_id_fk'); // Explicit FK name
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
