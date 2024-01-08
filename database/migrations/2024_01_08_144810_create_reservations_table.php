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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string("name",200);
            $table->string("phone_number",200);
            $table->smallInteger("num_guests");
            $table->string("check_in_date",200);
            $table->string("destination",200);
            $table->decimal("price",30,2);
            $table->bigInteger("user_id");
            $table->string("status",200)->default('Processing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
