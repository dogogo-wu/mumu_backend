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
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('category')->nullable()->comment('種類');
            $table->string('title')->nullable()->comment('標題');
            $table->string('describe')->nullable()->comment('說明');
            $table->text('pre')->nullable()->comment('術前準備');
            $table->text('care')->nullable()->comment('術後照護');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infos');
    }
};
