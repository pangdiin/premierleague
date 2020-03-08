<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('second_name');
            $table->float('form');
            $table->unsignedInteger('total_points');
            $table->float('influence');
            $table->float('creativity');
            $table->float('threat');
            $table->float('ict_index');
            $table->float('now_cost');
            $table->float('points_per_game');
            $table->string('status');
            $table->integer('team');
            $table->integer('team_code');
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
        Schema::dropIfExists('players');
    }
}
