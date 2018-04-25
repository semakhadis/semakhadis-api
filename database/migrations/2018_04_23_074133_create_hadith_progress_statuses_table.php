<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHadithProgressStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hadith_progress_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status', 14)->comment('FK hadith_progress_statuses - 1: draf/diterbitkan/disemak/dibuang');
            $table->string('slug', 16);
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
        Schema::dropIfExists('hadith_progress_statuses');
    }
}
