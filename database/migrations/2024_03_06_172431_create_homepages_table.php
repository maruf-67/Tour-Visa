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
        Schema::create('homepages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('fav_icon')->nullable();
            $table->text('logo')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->text('head_tag')->nullable();
            $table->string('author_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepages');
    }
};
