<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->text('location');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }
       public function down()
    {
        Schema::dropIfExists('internships');
    }
};
