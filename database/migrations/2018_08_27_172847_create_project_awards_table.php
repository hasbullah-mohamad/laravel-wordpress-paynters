<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Config::get('cms.db_prefix') . 'projects_awards', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('award_id');
            $table->unsignedInteger('awarder_id')->nullable();
            $table->unsignedInteger('project_id');
            $table->string('subtitle')->nullable();
            $table->unsignedInteger('year');
            $table->string('thumbnail_url')->nullable();
            $table->string('badge_url')->nullable();
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
        Schema::dropIfExists(Config::get('cms.db_prefix') . 'projects_awards');
    }
}
