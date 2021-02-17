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
			// Base info
			$table->string('name')->nullable();
			$table->string('color')->nullable();
			$table->string('gender')->nullable();
			$table->string('height')->nullable();
			$table->string('weight')->nullable();
			$table->string('teeth')->nullable();
			$table->string('birthday')->nullable();
			$table->string('age')->default('adult');
			$table->mediumText('titles')->nullable();
			// Checkboxes
			$table->tinyInteger('has_fontanel')->default(0);
			$table->tinyInteger('is_published')->default(0);
			$table->tinyInteger('is_for_sale')->default(0);
			// Family tree
			$table->bigInteger('grandfather_id')->unsigned()->nullable();
			$table->bigInteger('grandmother_id')->unsigned()->nullable();
			$table->bigInteger('grandchild_id')->unsigned()->nullable();
			$table->bigInteger('father_id')->unsigned()->nullable();
			$table->bigInteger('mother_id')->unsigned()->nullable();
			$table->bigInteger('child_id')->unsigned()->nullable();
			// People
			// $table->foreignId('person_id')->nullable()->constrained('people');
            // Timestamps
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
