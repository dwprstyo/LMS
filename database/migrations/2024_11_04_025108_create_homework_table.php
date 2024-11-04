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
    Schema::create('homework', function (Blueprint $table) {
        $table->id();
        $table->text('homework');
        $table->foreignId('class_id')
            ->nullable()
            ->constrained('class_subjects') // Corrected table name
            ->onDelete('set null')
            ->index()
            ->name('homework_class_id_fk'); // Explicit FK name
        $table->foreignId('created_by')
            ->nullable()
            ->constrained('users')
            ->onDelete('set null')
            ->index()
            ->name('homework_created_by_fk'); // Explicit FK name
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homework');
    }
};
