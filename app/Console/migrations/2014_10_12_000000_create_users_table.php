<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->enum('user_type', ['Admin', 'Employees','Super Admin','Patient','Accountant','Receptionist','Lab Scientist','Radiographer','Sonographer']);
            $table->enum('status', ['Active', 'Pending']);
            $table->tinyInteger('employees')->default(0);
            $table->tinyInteger('patitents')->default(0);
            $table->tinyInteger('testcategory')->default(0);
            $table->tinyInteger('referral')->default(0);
            $table->tinyInteger('billing')->default(0);
            $table->tinyInteger('pathology')->default(0);
            $table->tinyInteger('radiology')->default(0);
            $table->tinyInteger('ultrasonography')->default(0);
            $table->tinyInteger('electrocardiography')->default(0);
            $table->tinyInteger('reportbooth')->default(0);
            $table->tinyInteger('financial')->default(0);
            $table->tinyInteger('report_g')->default(0);
            $table->tinyInteger('inventory')->default(0);
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
        Schema::dropIfExists('users');
    }
}
