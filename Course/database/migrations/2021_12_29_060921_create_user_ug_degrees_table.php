<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserUgDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_ug_degrees', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('passed_out')->nullable();
            $table->string('studying_year')->nullable();
            $table->string('degree_id');
            $table->string('specializtion_id');
            $table->string('college_id');
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
        Schema::dropIfExists('user_ug_degrees');
    }
}
