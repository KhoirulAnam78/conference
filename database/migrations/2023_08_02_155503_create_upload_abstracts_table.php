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
        Schema::create('upload_abstracts', function (Blueprint $table) {
            $table->id();
            $table->string('topic');
            $table->string('type');
            $table->string('title');
            $table->string('authors');
            $table->text('institutions');
            $table->text('abstract');
            $table->string('keywords');
            $table->string('presenter');
            $table->foreignId('participant_id')->constrained('participants');
            $table->enum('status', ['not yet reviewed', 'accepted', 'rejected'])->default('not yet reviewed');
            $table->string('reviewed_by')->nullable();
            $table->string('loa')->nullable();
            $table->string('invoice')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upload_abstracts');
    }
};
