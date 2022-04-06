<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jukref extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jukrefs', function (Blueprint $table) {
            $table->id();
            $table->string('no_petunjuk');
            $table->string('name');
            $table->date('tgl');
            $table->string('file');
            $table->string('pembina')->nullable();
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
        Schema::dropIfExists('jukrefs');
    }
}
