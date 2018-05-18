<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHadithStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hadith_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status', 20)->unique()->comment('FK hadith_statuses - 1: draft/sahih/tidak sahih/palsu/hasan/dhaif/maudhu');
            $table->string('slug', 22)->unique();
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
        Schema::dropIfExists('hadith_statuses');
    }
}
