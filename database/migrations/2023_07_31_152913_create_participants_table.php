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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('full_name1');
            $table->string('full_name2');
            $table->enum('gender', ['male', 'female']);
            $table->enum('participant_type', ['professional presenter', 'student presenter', 'participant']);
            $table->text('institution');
            $table->text('address');
            $table->string('phone');
            $table->string('hki_id')->nullable();
            $table->string('member_card')->nullable();
            $table->enum('attendance', ['offline', 'online']);
            $table->enum('hki_status', ['not a member', 'not yet validated', 'valid', 'invalid'])->default('not a member');
            $table->string('hki_validated_by')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
