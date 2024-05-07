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
        Schema::create('upload_fulltexts', function (Blueprint $table) {
            $table->id();
            $table->string('fulltext');
            $table->string('title');
            $table->enum('validation', ['valid', 'invalid', 'not yet validated']);
            $table->string('validated_by')->nullable();
            $table->foreignId('payment_id')->constrained('payments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upload_fulltexts');
    }
};
