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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string("image")->nullable();
            $table->string("title");
            $table->string('writer');
            $table->text("paragraf_1");
            $table->text("paragraf_2");
            $table->text("paragraf_3");
            $table->text("paragraf_4");
            // $table->string('ip_address');
            // $table->string('user_agent')->nullable();
            // $table->timestamp('visited_at');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article');
    }
};
