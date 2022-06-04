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
        Schema::create('teach_pics', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('img')->nullable()->comment('圖片路徑');
            $table->integer('order')->nullable()->comment('圖片順序');
            $table->string('remark')->nullable()->comment('圖片備註');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teach_pics');
    }
};
