<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jukgar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jukgars', function (Blueprint $table) {
            $table->id();
            $table->integer('bidang_id');
            $table->string('no_petunjuk');
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
        Schema::dropIfExists('jukgars');
    }
}
