<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServersTable extends Migration {
    public function up() {
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('memory');
            $table->integer('disk');
            $table->integer('cpu');
            $table->string('node_id');
            $table->string('allocation_id');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('servers');
    }
}