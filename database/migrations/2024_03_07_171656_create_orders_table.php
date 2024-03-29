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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('reference_id');
            $table->unsignedBigInteger('citizen_country_id');
            $table->foreign('citizen_country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('restrict');
            $table->string('email');
            $table->string('phone');
            $table->tinyInteger('count')->default(1)->comment('Number of orders');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
