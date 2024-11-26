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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('creator_id')->default(1);
            $table->foreign("creator_id")->references("id")->on("users");
            $table->unsignedBigInteger('leader_id');
            $table->foreign('leader_id')->references("id")->on("users");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
