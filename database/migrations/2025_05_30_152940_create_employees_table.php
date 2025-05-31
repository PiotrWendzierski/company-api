<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // create employees table with description
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade')->comment("where employee belogns to");
            $table->string('first_name')->comment("name of employee");
            $table->string('last_name')->comment("surname of employee");
            $table->string('email')->comment("contact e-mail");
            $table->string('phone')->nullable()->comment("contact phone number");
            $table->timestamps();
        });
    }

    //delete employees table (if already exist)
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
