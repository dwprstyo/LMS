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
        Schema::create('user_class', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null')
                ->index()
                ->name('user_class_user_id_fk'); // Explicit FK name
            $table->foreignId('class_id')
                ->nullable()
                ->constrained('class_subjects')
                ->onDelete('set null')
                ->index()
                ->name('user_class_class_id_fk'); // Explicit FK name
            $table->timestamps();
        });
    }


    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_class');
    }
};
