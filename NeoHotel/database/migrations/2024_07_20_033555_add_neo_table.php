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

        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_code',256);
            $table->string('room_name',256);
            $table->tinyInteger('room_type');
            $table->tinyInteger('status')->default(0)->nullable();
            $table->decimal('price', 17,0)->default(0)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('room_type');
            $table->timestamp('start_date')->useCurrent();
            $table->timestamp('end_date')->useCurrent();
            $table->integer('adult');
            $table->integer('children')->default(0)->nullable();
            $table->integer('number_of_rooms')->default(1);
            $table->tinyInteger('breakfast')->default(0);

            $table->string('c_first_name',256);
            $table->string('c_last_name',256);
            $table->string('c_email',256);
            $table->string('c_phone',50);
            $table->string('c_request',1024)->nullable();

            $table->tinyInteger('status')->default(0)->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('booking_room', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreignId('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->tinyInteger('status')->default(0)->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });


        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name',256);
            $table->decimal('price', 17,0)->default(0)->nullable();
            $table->tinyInteger('status')->default(0)->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('booking_service', function (Blueprint $table) {
            $table->id();
            $table->integer('sl')->default(0)->nullable();
            $table->decimal('price', 17,0)->default(0)->nullable();
            $table->decimal('money', 17,0)->default(0)->nullable();
            $table->foreignId('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreignId('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->tinyInteger('status')->default(0)->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
