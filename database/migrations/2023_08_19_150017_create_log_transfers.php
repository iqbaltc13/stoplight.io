<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogTransfers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_transfers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('from_rekening_id')->nullable();
            $table->bigInteger('to_rekening_id')->nullable();
            $table->bigInteger('amount')->nullable()->default(0);
            $table->bigInteger('created_by_id')->nullable()->default(0);
            $table->bigInteger('updated_by_id')->nullable();
            $table->bigInteger('deleted_by_id')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_transfers');
    }
}
