<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserTableFix extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
Schema::table('users', function (Blueprint $table) {
$table->integer('u_id')->nullable();
$table->string('device_type')->default(0);
});
}

/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
//
}
}