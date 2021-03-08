<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Config::get('cms.db_prefix') . 'projects', function (Blueprint $table) {
            $table->dropColumn('category_id');
            $table->dropColumn('featured');
            $table->string('slug')->after('title');
            $table->text('content')->nullable()->after('title');
            $table->boolean('featured_at_home')->default(false)->after('region_id');
            $table->boolean('featured_at_projects')->default(false)->after('region_id');
            $table->unsignedInteger('menu_order')->after('region_id');
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
            $table->unsignedInteger('category_id')->nullable()->after('region_id');
            $table->boolean('featured')->default(false)->after('category_id');
            $table->dropColumn('featured_at_home');
            $table->dropColumn('featured_at_projects');
            $table->dropColumn('slug');
            $table->dropColumn('content');
            $table->dropColumn('menu_order');
        });
    }
}
