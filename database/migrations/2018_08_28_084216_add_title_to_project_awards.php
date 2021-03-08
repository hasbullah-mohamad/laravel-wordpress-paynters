<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTitleToProjectAwards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Config::get('cms.db_prefix') . 'projects_awards', function (Blueprint $table) {
            $table->string('title')->after('project_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Config::get('cms.db_prefix') . 'projects_awards', function (Blueprint $table) {
            $table->dropColumn('title');
        });
    }
}
