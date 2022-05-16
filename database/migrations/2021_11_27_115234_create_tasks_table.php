<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Database\Seeders\PermissionTableSeeder;
use Database\Seeders\CreateUsersSeeder;
use Database\Seeders\CreateTagsToTasks;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('user_create_id');
            $table->foreign('user_create_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->foreign('tag_id')
                ->references('id')->on('tags')
                ->onDelete('cascade');
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->foreign('comment_id')
                ->references('id')->on('comment_to_task')
                ->onDelete('cascade');
            $table->string('position')->nullable();
            $table->string('title')->nullable();
            $table->mediumtext('description')->nullable();
            $table->date('date_todo')->nullable();
            $table->string('status')->nullable();
            $table->string('theme')->nullable();
            $table->string('comment')->nullable();
            $table->string('favorite')->nullable();
            $table->string('from_advertisers')->nullable();
            $table->timestamps();
        });

        $perm   = new PermissionTableSeeder();
        $users  = new CreateUsersSeeder();
        $tags   = new CreateTagsToTasks();
        $perm->run();
        $users->run();
        $tags->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
