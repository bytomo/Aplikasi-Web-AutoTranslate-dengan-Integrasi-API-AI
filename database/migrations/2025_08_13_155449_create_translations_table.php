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
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('source_lang', 10)->index();
            $table->string('target_lang', 10)->index();
            $table->text('source_text');
            $table->longText('translated_text')->nullable();
            $table->string('provider')->default('azure'); // nama provider AI
            $table->unsignedInteger('char_count')->default(0);
            $table->decimal('cost_estimate', 10, 6)->default(0); // jika ingin estimasi biaya
            $table->json('meta')->nullable(); // simpan detail respons/API usage
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translations');
    }
};
