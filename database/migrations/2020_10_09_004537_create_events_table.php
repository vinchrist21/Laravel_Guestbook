<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title'); //kalo boleh null namanya, ->nullable
            $table->text('description')->nullable();
            $table->enum('status', ['0', '1'])
                ->default('0')
                ->comment('0 = close, 1 = open');
            $table->bigInteger('noa')
                ->default(0)
                ->comment('Number of Attendant');
            $table->date('event_date');
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
        Schema::dropIfExists('events');
    }
}
