<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //create companies table
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment("full name of company");
            $table->string('nip')->unique()->comment('unique number of company');
            $table->string('adress')->comment("company adress");
            $table->string('city')->comment("city where company is");
            $table->string('postal_code')->comment("postal code of company");
            $table->timestamps();
        });
    }

    //delete companies table (if already exists)
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
