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
        Schema::create('student_target_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->index('stu_tar_id_index');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedInteger('target');
            $table->timestamps();

            $table->foreign('student_id', 'stu_tar_id_foreign')->references('id')->on('students')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_target_data');
    }
};
