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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('reference_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->string('sex');
            $table->unsignedBigInteger('birth_country_id');
            $table->foreign('birth_country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('restrict');
            $table->unsignedBigInteger('passport_country_id');
            $table->foreign('passport_country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('restrict');
            $table->string('passport_number');
            $table->date('passport_issue');
            $table->date('passport_expiry');
            $table->date('intended_date');
            $table->text('image')->nullable();
            $table->text('passport_bio_data')->nullable();
            $table->text('visa_image')->nullable();
            $table->boolean('is_payment')->default(false);
            $table->boolean('is_refund')->default(false);
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('restrict');
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('restrict');
            $table->tinyInteger('status')->default(1)->comment('(1) Pending, (2) Processing, (3) Approved, (4) On-Hold , (5) Rejected');
            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
