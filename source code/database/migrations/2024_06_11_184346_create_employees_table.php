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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender', ['male', 'female']);
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->date('join_date');
            $table->foreignId('department_id')->nullable()->constrained('departments')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('designation_id')->nullable()->constrained('designations')->nullOnDelete()->cascadeOnUpdate();
            $table->date('birth_date');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
