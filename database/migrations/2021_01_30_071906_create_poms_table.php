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
			
			$table->string('name')->nullable();
			$table->string('color')->nullable();
			$table->string('gender')->nullable();
			$table->string('height')->nullable();
			$table->string('weight')->nullable();
			$table->string('teeth')->nullable();
			$table->string('birthday')->nullable();

			$table->tinyInteger('is_published')->default(0);
			$table->tinyInteger('is_for_sale')->default(0);
			$table->tinyInteger('fontanel')->default(0);
			$table->tinyInteger('is_puppy')->default(0);
			
			$table->string('father')->nullable();
			$table->string('mother')->nullable();
			$table->string('grandfather')->nullable();
			$table->string('grandmother')->nullable();
			$table->string('breeder')->nullable();
			$table->string('owner')->nullable();
            
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
