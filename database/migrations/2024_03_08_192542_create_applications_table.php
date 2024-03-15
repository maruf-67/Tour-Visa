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
            $table->string('email');
            $table->string('phone');
            $table->date('dob');
            $table->string('gender');
            $table->text('address')->nullable();
            $table->unsignedBigInteger('birth_country_id');
            $table->foreign('birth_country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('restrict');
            $table->unsignedBigInteger('citizen_country_id');
            $table->foreign('citizen_country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('restrict');
            $table->text('details')->nullable();
            $table->unsignedBigInteger('passport_country_id');
            $table->foreign('passport_country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('restrict');
            $table->string('passport_number');
            $table->date('passport_issue');
            $table->date('passport_expiry');
            $table->text('passport_image')->nullable();
            $table->date('intended_date');
            $table->text('visa_image')->nullable();
            $table->boolean('is_war_crime')->default(false);
            $table->boolean('is_criminal_record')->default(false);
            $table->boolean('is_payment')->default(false);
            $table->boolean('is_refund')->default(false);
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('restrict');
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('restrict');
            $table->tinyInteger('status')->default(1)->comment('(1) Pending, (2) Processing, (3) Approved, (4) On-Hold , (5) Rejected');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('hold');
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
