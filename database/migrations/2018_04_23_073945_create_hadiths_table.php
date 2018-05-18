<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHadithsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hadiths', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',120);
            $table->string('slug',150)->unique();
            $table->text('text_malay');
            $table->text('text_arab');
            $table->text('description')->comment('Explaination on the hadiths')->nullable();
            $table->integer('hadith_statuses_id')->default(1);
            $table->integer('hadith_progress_statuses_id')->default(1);
            $table->integer('hadith_narrators_id')->comment('FK hadith_narrators')->nullable();
            $table->integer('hadith_references_id')->comment('FK hadith_books')->nullable();
            $table->integer('created_by')->comment('Creator of hadith - FK users');
            $table->text('logs')->comment('Audit logs of the hadith')->nullable();
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
        Schema::dropIfExists('hadiths');
    }
}
