<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('street_id')->unsigned();
            $table->bigInteger('barangay_id')->unsigned();
            $table->bigInteger('municipal_id')->unsigned();
            $table->bigInteger('province_id')->unsigned();
            $table->foreign('street_id')->references('id')->on('street')->onDelete('cascade');
            $table->foreign('barangay_id')->references('id')->on('barangay')->onDelete('cascade');
            $table->foreign('municipal_id')->references('id')->on('municipal')->onDelete('cascade');
            $table->foreign('province_id')->references('id')->on('province')->onDelete('cascade');
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
        Schema::dropIfExists('address');
    }
}
