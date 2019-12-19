<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('kindHouse');
            $table->string('kindRoom');
            $table->string('address');
            $table->integer('numBedroom');
            $table->integer('numBathroom');
            $table->text('description');
            $table->integer('price');
            $table->string('status');

            $table->unsignedBigInteger('city_id')->nullable()->index();
            $table->foreign('city_id')->references('id')->on('cities')
                ->onDelete('cascade')->onUpdate('restrict');

            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('restrict');

            $table->unsignedBigInteger('district_id')->nullable()->index();
            $table->foreign('district_id')->references('id')->on('districts')
            ->onDelete('cascade')
            ->onUpdate('restrict');
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
        Schema::dropIfExists('houses');
    }
}
