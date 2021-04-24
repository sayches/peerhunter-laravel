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

            $table->id();

            $table->string('name')->nullable();

            $table->string('email')->unique()->nullable();

            $table->timestamp('email_verified_at')->nullable();

            $table->string('phone')->nullable();

            $table->string('country_code')->nullable();

            $table->string('longitude')->nullable();

            $table->string('latitude')->nullable();

            $table->string('password')->nullable();

            $table->boolean('is_verified')->nullable();
            $table->boolean('is_visible')->default(1);

            $table->string('image')->nullable();

            $table->text('description')->nullable();

            $table->text('api_token')->nullable();

            $table->rememberToken();

            $table->softDeletes();

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

