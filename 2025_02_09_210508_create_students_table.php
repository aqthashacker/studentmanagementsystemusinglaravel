<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_code')->unique(); 
            $table->string('first_name');
            $table->string('middle_name')->nullable(); 
            $table->string('last_name');
            $table->date('birth_date'); 
            $table->enum('gender', ['Male', 'Female', 'Other']); 
            $table->string('address_one');
            $table->string('city');
            $table->enum('district', ['Kandy', 'Trincomalee', 'Jaffna', 'Anuradhapura', 'Kurunegala', 'Ratnapura', 'Galle', 'Badulla', 'Colombo']);
            $table->string('email')->unique(); 
            $table->string('contact_no')->unique();
            $table->string('profile_image')->nullable(); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
