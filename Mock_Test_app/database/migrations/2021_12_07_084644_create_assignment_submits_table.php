<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentSubmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_submits', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('assignment_id');
            $table->string('submit_date');
            $table->string('submit_time');
            $table->string('github_url');
            $table->string('status');
            $table->string('output_url')->nullable();
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
        Schema::dropIfExists('assignment_submits');
    }
}
