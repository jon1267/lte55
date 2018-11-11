<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllTablesForMenuHome extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // main slider, 3 records
        Schema::create('msliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('p1');
            $table->string('p2');
            $table->string('p3');
            $table->string('p4');
            $table->string('p5');
            $table->decimal('price', 8,2);
            $table->string('img');
            $table->timestamps();
        });

        // secondary slider, (home1) 2 records
        Schema::create('ssliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('img');
            $table->timestamps();
        });

        // table features - 6 records
        Schema::create('features', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('blue');
            $table->text('text');
            $table->string('img');
            $table->timestamps();
        });

        // table prices 4 records
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->decimal('price', 8, 2);
            $table->string('mo', 10);
            $table->string('yearly', 50);
            $table->string('hdd', 50);
            $table->string('bandwidth', 50);
            $table->string('ram', 50);
            $table->string('ip', 50);
            $table->string('cpanel', 50);
            $table->string('os', 50);
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
        Schema::dropIfExists('msliders');
        Schema::dropIfExists('ssliders');
        Schema::dropIfExists('features');
        Schema::dropIfExists('prices');
    }
}
