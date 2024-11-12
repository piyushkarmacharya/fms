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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("member_id");
            $table->foreign("member_id")->references("id")->on("member")->onDelete('cascade');
            $table->date("date");
            $table->time("time");
            $table->unsignedBigInteger("rate");
            $table->unsignedBigInteger("payment_amount");
            $table->boolean("payment_cleared")->default(false);
            $table->string("status")->default("pending");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
