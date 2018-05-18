<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHadithReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hadith_references', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hadiths_id');
            $table->integer('references_id');
            $table->integer('pages')->nullable();
            $table->string('chapter',60)->nullable();
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
        Schema::dropIfExists('hadith_references');
    }
}
