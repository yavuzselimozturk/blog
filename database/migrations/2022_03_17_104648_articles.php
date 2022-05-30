<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Events\MigrationEvent;




class Articles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('kategoriler')->onDelete('cascade');
            $table->string('baslik');
            $table->longText('icerik');
            $table->integer('hit')->default(0);
            $table->integer('status')->default(0)->comment('0:pasif 1:aktif');
            $table->string('resim');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
