<?php

/**
 * This file is the migration for reports
 *
 * @author     mrdeng <mohdizzudinrazali@gmail.com>
 */


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',120);
            $table->string('email',120)->comment('email pelapor, summary report dihantar ke email');
            $table->string('description');
            $table->string('status',20)->comment('status reportt dibuka/ditutup')->default('dibuka');
            $table->integer('hadiths_id')->comment('hadith yang dirujuk dalam report');
            $table->integer('created_by')->comment('Creator of hadith - FK users');
            $table->timestamp('closed_at')->comment('Time of report closed')->nullable();
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
        Schema::dropIfExists('reports');
    }
}
