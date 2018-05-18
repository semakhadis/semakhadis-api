<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNarratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('narrators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->string('slug',30)->unique();
            $table->string('full_name', 120)->nullable();
            $table->text('info')->nullable();
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
        Schema::dropIfExists('narrators');
    }
}
