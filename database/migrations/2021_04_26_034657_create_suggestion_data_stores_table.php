<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuggestionDataStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggestion_data_stores', function (Blueprint $table) {
            $table->id();
            $table->string('Address');
            $table->string('Main');
            $table->string('Sec');
            $table->float('lat');
            $table->float('lng');
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
        Schema::dropIfExists('suggestion_data_stores');
    }
}
