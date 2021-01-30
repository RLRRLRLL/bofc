<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poms', function (Blueprint $table) {
			$table->id();
			$table->string('pom_id');
			$table->string('name');
			$table->string('color');
			$table->string('gender');
			$table->string('height');
			$table->string('weight');
			$table->string('teeth');
			$table->string('birthday');
			$table->string('rodnik');
			$table->tinyInteger('is_for_sale')->default(0);
			$table->tinyInteger('is_puppy')->default(0);
			$table->string('father');
			$table->string('mother');
			$table->string('grandfather');
			$table->string('grandmother');
			$table->string('breeder');
			$table->string('owner');
			$table->string('title');
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
        Schema::dropIfExists('poms');
    }
}
