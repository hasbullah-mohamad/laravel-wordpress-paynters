<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectsCompletionFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Config::get('cms.db_prefix') . 'projects', function (Blueprint $table) {
            $table->dropColumn('featured_at_home');
            $table->dropColumn('featured_at_projects');
            $table->string('completion_date')->nullable()->after('menu_order');
            $table->unsignedInteger('completed')->nullable()->after('menu_order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Config::get('cms.db_prefix') . 'projects', function (Blueprint $table) {
            $table->dropColumn('completion_date');
            $table->dropColumn('completed');
            $table->boolean('featured_at_home')->default(false)->after('region_id');
            $table->boolean('featured_at_projects')->default(false)->after('region_id');
        });
    }
}
