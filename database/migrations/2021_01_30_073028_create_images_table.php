<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
			$table->id();
			$table->string('url', 100);
			$table->tinyInteger('is_avatar')->default(0);
			$table->timestamps();
			
			$table->bigInteger('pom_id')->unsigned();
            $table->foreign('pom_id')
                    ->references('id')
                    ->on('poms')
                    ->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
