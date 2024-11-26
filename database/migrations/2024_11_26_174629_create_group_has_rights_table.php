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
        Schema::create('group_has_rights', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("right_id");
            $table->foreign("right_id")->references("id")->on("rights");
            $table->unsignedBigInteger("group_id");
            $table->foreign("group_id")->references("id")->on("groups");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_has_rights');
    }
};
