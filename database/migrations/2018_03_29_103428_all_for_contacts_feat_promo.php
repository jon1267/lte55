<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllForContactsFeatPromo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100);
            $table->string('p1',100);
            $table->string('p2',100);
            $table->string('p3',100);
            $table->string('description');
            $table->string('img');
            $table->timestamps();
        });

        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('p1');
            $table->string('t1');
            $table->string('p2');
            $table->string('t2');
            $table->string('p3');
            $table->string('t3');
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
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('promotions');
    }
}
