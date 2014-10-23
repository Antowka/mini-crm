<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserCompanies extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_companies', function($table){
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('company_id');
            $table->string('profession', 255);
            $table->integer('departments_id');
            $table->integer('status_in_company_id');
            $table->index('company_id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_companies');
	}

}
