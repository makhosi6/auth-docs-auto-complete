<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analytics', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('uuky')->nullable();
            $table->string('token');
            $table->string('ip');
            $table->string('query')->nullable();
            $table->string('hostname')->nullable();
            $table->bigInteger('timestamp');
            $table->string('params')->nullable();
            $table->text('rawHeaders')->nullable();
            $table->string('body')->nullable();
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
        Schema::dropIfExists('analytics');
    }
};
