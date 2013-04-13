<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTweetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tweets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('id_str');
                        $table->dateTime('posted_on');
                        $table->string('text');
                        $table->string('user_id');
                        $table->string('user_screen_name');
                        $table->string('user_name');
                        $table->text('user_profile_image');
                        $table->text('media_url');
                        $table->text('media_url_https');
                        $table->text('url');
                        $table->text('display_url');
                        $table->text('expanded_url');
                        $table->integer('size_large_w');
                        $table->integer('size_large_h');
                        $table->string('size_large_resize');
                        $table->integer('size_medium_w');
                        $table->integer('size_medium_h');
                        $table->string('size_medium_resize');
                        $table->integer('size_small_w');
                        $table->integer('size_small_h');
                        $table->string('size_small_resize');
                        $table->integer('size_thumb_w');
                        $table->integer('size_thumb_h');
                        $table->string('size_thumb_resize');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tweets');
	}

}