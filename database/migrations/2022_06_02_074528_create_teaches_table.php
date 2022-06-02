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
        Schema::create('teaches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('img')->nullable()->comment('圖片路徑');
            $table->float('opacity')->nullable()->comment('透明度');
            $table->string('title')->nullable()->comment('標題');
            $table->string('content')->nullable()->comment('內文');
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
        Schema::dropIfExists('teaches');
    }
};
