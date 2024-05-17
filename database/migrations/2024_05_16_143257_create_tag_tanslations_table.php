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
        Schema::create('tag_tanslations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("tag_id")->constained()->cascadeOnDelete();
            $table->string("locale")->index();
            $table->string('title');
            $table->unique(['tag_id',"locale"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_tanslations');
    }
};
