<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('keywords', function(Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
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
        Schema::drop('keywords');
    }
}
