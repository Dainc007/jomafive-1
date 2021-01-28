<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('hosts');
            $table->string('visitors');
            $table->integer('hosts_goals');
            $table->integer('visitors_goals');
            $table->enum('group', ['A', 'B', 'C', 'D']);
            $table->date('date');
            $table->time('hour');
            $table->integer('pitch');
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
        Schema::dropIfExists('games');
    }
}
