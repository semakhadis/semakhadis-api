<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name',100)->comment('the file name based on title wte');
            $table->string('mime',20)->comment('type of files');
            $table->string('path',255)->comment('path of the file in the storage');
            $table->string('thumbnail_path',255)->comment('path of the file thumbnail in the storage, if not image, use logo of mime instead');
            $table->string('description',100)->nullable()->comment('Notes for the files');
            $table->integer('created_by')->comment('The user who upload the file- FK users');
            // $table->integer('reference_id')->nullable()->comment('The reference id of the class');
            // $table->string('reference_type',50)->nullable()->comment('the reference class');
            $table->morphs('referenceable');//->comment('the reference class')
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
        Schema::dropIfExists('files');
    }
}
