<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('qr_code');
            $table->decimal('price', 15, 2);
            $table->string('slug')->unique();
            $table->integer('duration');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
