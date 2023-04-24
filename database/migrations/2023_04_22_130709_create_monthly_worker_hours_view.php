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
                CONCAT(u.first_name, ' ', u.last_name) as worker_name,
                SUM(s.duration) as total_hours
            FROM
                transactions as t
            JOIN
                services as s ON t.service_id = s.id
            JOIN
                users as u ON s.user_id = u.id
            WHERE
                EXTRACT(YEAR FROM t.created_at) = EXTRACT(YEAR FROM NOW()) AND
                EXTRACT(MONTH FROM t.created_at) = EXTRACT(MONTH FROM NOW())
            GROUP BY
                worker_name
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
