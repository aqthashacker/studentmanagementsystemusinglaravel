<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Alter the student_code column to string
        Schema::table('enrollments', function (Blueprint $table) {
            $table->string('student_code')->change();
        });
    }

    public function down(): void
    {
        // Revert the student_code column back to integer if necessary
        Schema::table('enrollments', function (Blueprint $table) {
            $table->integer('student_code')->change();
        });
    }
};
