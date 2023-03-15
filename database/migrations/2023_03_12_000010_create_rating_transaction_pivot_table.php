<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingTransactionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('rating_transaction', function (Blueprint $table) {
            $table->unsignedBigInteger('rating_id');
            $table->foreign('rating_id', 'rating_id_fk_7987773')->references('id')->on('ratings')->onDelete('cascade');
            $table->unsignedBigInteger('transaction_id');
            $table->foreign('transaction_id', 'transaction_id_fk_7987773')->references('id')->on('transactions')->onDelete('cascade');
        });
    }
}
