<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('domains', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('domaingroup_id')->unsigned();
            $table->foreign('domaingroup_id')
                ->references('id')
                ->on('domaingroups')
                ->onDelete('cascade');
            $table->integer('keywordgroup_id')->unsigned();
            $table->foreign('keywordgroup_id')
                ->references('id')
                ->on('keywordgroups')
                ->onDelete('cascade');
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
        Schema::drop('domains');
    }
}
