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
			$table->string('height')->nullable();
			$table->string('teeth')->nullable();
			$table->string('birthday')->nullable();
			$table->string('age')->default('adult');
			$table->mediumText('titles')->nullable();
			
			$table->boolean('is_open_for_breeding')->default(false);
			$table->boolean('has_fontanel')->default(false);
			$table->boolean('is_published')->default(false);
			$table->boolean('is_for_sale')->default(false);
			$table->boolean('is_male')->default(false);
            
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
