<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
      /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW monthly_worker_hours AS
        SELECT
            users.id AS user_id,
            CONCAT(users.first_name, ' ', users.last_name) AS worker_name,
            EXTRACT(YEAR FROM transactions.created_at) AS year,
            EXTRACT(MONTH FROM transactions.created_at) AS month,
            SUM(services.duration) / 60 AS total_hours
        FROM
            transactions
            JOIN services ON transactions.service_id = services.id
            JOIN users ON services.user_id = users.id
        GROUP BY
            users.id,
            CONCAT(users.first_name, ' ', users.last_name),
            EXTRACT(YEAR FROM transactions.created_at),
            EXTRACT(MONTH FROM transactions.created_at);
        ");
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS monthly_worker_hours');
    }
};
