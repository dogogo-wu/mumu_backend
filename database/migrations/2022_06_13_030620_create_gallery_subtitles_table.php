<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_subtitles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('category')->nullable()->comment('種類');
            $table->string('title')->nullable()->comment('標題');
            $table->string('subtitle')->nullable()->comment('副標題');
            $table->integer('order')->nullable()->comment('順序');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_subtitles');
    }
};
