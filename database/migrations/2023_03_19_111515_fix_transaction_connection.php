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
        Schema::dropIfExists('transaction_user');
        Schema::dropIfExists('service_transaction');

        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id', 'service_id_fk_7987771')->references('id')->on('services')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_7987771')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
