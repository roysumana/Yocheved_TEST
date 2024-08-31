<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->index('se_stu_index');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('type', 20);
            $table->unsignedTinyInteger('rate')->nullable();
            $table->boolean('is_notified')->default(false);
            $table->timestamps();
            $table->foreign('student_id', 'se_stu_foreign')->references('id')->on('students')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_sessions');
    }
};
