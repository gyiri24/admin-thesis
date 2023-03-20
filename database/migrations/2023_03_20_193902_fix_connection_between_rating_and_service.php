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
       Schema::dropIfExists('rating_transaction');

        Schema::table('ratings', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('rating_transaction', function (Blueprint $table) {
            $table->unsignedBigInteger('rating_id');
            $table->foreign('rating_id', 'rating_id_fk_7987773')->references('id')->on('ratings')->onDelete('cascade');
            $table->unsignedBigInteger('transaction_id');
            $table->foreign('transaction_id', 'transaction_id_fk_7987773')->references('id')->on('transactions')->onDelete('cascade');
        });

        Schema::table('ratings', function (Blueprint $table) {
            $table->dropColumn('service_id');
            $table->dropColumn('user_id');
        });
    }
};
