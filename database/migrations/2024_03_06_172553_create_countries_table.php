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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('iso', 2);
            $table->string('name', 80);
            $table->string('nicename', 80);
            $table->char('iso3', 3)->nullable();
            $table->smallInteger('numcode')->nullable();
            $table->integer('phonecode');
            $table->tinyInteger('status')->default(1)->comment('1=>Active, 0=>Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
