<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventorieshistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventorieshistory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('inventories_id');
            $table->string('brandname')->nullable();
            $table->string('shopname')->nullable();
            $table->string('quentity')->nullable();
            $table->string('amount')->nullable();
            $table->string('dateofpurches')->nullable();
            $table->string('document')->nullable();
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
        Schema::dropIfExists('inventorieshistory');
    }
}
