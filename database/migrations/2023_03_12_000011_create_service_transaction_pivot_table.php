<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTransactionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('service_transaction', function (Blueprint $table) {
            $table->unsignedBigInteger('transaction_id');
            $table->foreign('transaction_id', 'transaction_id_fk_7987771')->references('id')->on('transactions')->onDelete('cascade');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id', 'service_id_fk_7987771')->references('id')->on('services')->onDelete('cascade');
        });
    }
}
