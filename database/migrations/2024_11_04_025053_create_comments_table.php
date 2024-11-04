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
    Schema::create('comments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('post_id')
            ->nullable()
            ->constrained('posts')
            ->onDelete('set null')
            ->index()
            ->name('comments_post_id_fk'); // Explicit FK name
        $table->foreignId('created_by')
            ->nullable()
            ->constrained('users')
            ->onDelete('set null')
            ->index()
            ->name('comments_created_by_fk'); // Explicit FK name
        $table->text('comment');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
