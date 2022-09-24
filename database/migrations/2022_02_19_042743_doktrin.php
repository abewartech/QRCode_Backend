<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Doktrin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doktrins', function (Blueprint $table) {
            $table->id();
            $table->string('no_doktrin');
            $table->string('name');
            $table->date('tgl');
            $table->string('file');
            $table->string('pembina')->nullable();
            $table->enum('is_protected', ['0', '1'])->default('0');
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
        Schema::dropIfExists('doktrins');
    }
}
