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
    Schema::create('submissions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('homework_id')
            ->nullable()
            ->constrained('homework')
            ->onDelete('set null')
            ->index()
            ->name('submissions_homework_id_fk'); // Explicit FK name
        $table->foreignId('user_id')
            ->nullable()
            ->constrained('users')
            ->onDelete('set null')
            ->index()
            ->name('submissions_user_id_fk'); // Explicit FK name
        $table->string('file_path');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
