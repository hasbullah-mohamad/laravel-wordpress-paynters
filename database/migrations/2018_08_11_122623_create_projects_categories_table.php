<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Config::get('cms.db_prefix') . 'projects_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('term_id');
            $table->unsignedInteger('project_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Config::get('cms.db_prefix') . 'projects_categories');
    }
}
