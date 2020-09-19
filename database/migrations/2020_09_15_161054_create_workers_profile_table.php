<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers_profile', function (Blueprint $table) {
            $table->bigInteger('worker_id')->unsigned();
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->date('birthday');

            $table->foreign('worker_id')->references('id')
                ->on('workers')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers_profile');
    }
}
