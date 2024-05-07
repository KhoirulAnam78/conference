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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('fee');
            $table->string('discount');
            $table->string('fee_after_discount');
            $table->string('total_bill');
            $table->string('proof_of_payment');
            $table->string('receipt')->nullable();
            $table->enum('validation', ['valid', 'invalid', 'not yet validated']);
            $table->string('validated_by')->nullable();
            $table->foreignId('upload_abstract_id')->nullable()->constrained('upload_abstracts');
            $table->foreignId('participant_id')->constrained('participants');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
