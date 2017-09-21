<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubredditsFilterToKeywordgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('keywordgroups', function (Blueprint $table) {

            $table->text('subreddits_filter')->after('slug')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('keywordgroups', function (Blueprint $table) {

            $table->dropColumn('subreddits_filter');

        });
    }
}
