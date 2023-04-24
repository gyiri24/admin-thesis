<?php

namespace App\Http\Controllers\Admin;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\Transaction;
use App\Models\Service;
use Carbon\Carbon;

class HomeController
{
    public function index()
    {
        /*$settings1 = [
            'chart_title'           => 'Transactions by user',
            'chart_type'            => 'bar',
            'report_type'           => 'group_by_relationship',
            'model'                 => 'App\Models\Service',
            'relationship_name'     => 'user',
            'group_by_field'        => 'user',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'price',
            'filter_field'          => 'created_at',
            'filter_period'         => 'year',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
            'translation_key'       => 'service',
        ];*/


// Létrehozni a diagramot
        $currentMonth = date('n');
        $month = [
            1 => 'Január',
            2 => 'Február',
            3 => 'Március',
            4 => 'Április',
            5 => 'Május',
            6 => 'Június',
            7 => 'Július',
            8 => 'Augusztus',
            9 => 'Szeptember',
            10 => 'Október',
            11 => 'November',
            12 => 'December'
        ];
        $settings1 = [
            'chart_title'           => $month[$currentMonth] . ' ' . 'hónap dolgozói munkaórái',
            'chart_type'            => 'bar',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\MonthlyWorkerHours',
            'group_by_field'        => 'worker_name',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'total_hours',
            'column_class'          => 'col-md-6',
            'translation_key'       => 'user',
        ];

        $chart1 = new LaravelChart($settings1);
        /*$settings1 = [
            'chart_title'           => 'Havi átlagos regisztráció',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\User',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'month',
            'aggregate_function'    => 'count',
            'calculate_average'     => true,
            'filter_field'          => 'created_at',
            'filter_period'         => 'month',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '12',
            'translation_key'       => 'user',
        ];


        $chart1 = new LaravelChart($settings1);*/

        $settings2 = [
            'chart_title'           => 'Havi regisztrációk',
            'chart_type'            => 'bar',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\User',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'month',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'month',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-12',
            'entries_number'        => '12',
            'translation_key'       => 'user',
        ];

        $chart2 = new LaravelChart($settings2);

        $settings3 = [
            'chart_title'           => 'Szolgáltatások átlagos értékelései',
            'chart_type'            => 'bar',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\Rating',
            'group_by_field'        => 'service_id',
            'aggregate_function'    => 'avg',
            'aggregate_field'       => 'rating',
            'column_class'          => 'col-md-6',
            'translation_key'       => 'service',
        ];

        $chart3 = new LaravelChart($settings3);

        $settings4 = [
            'chart_title'           => 'Heti ketto',
            'chart_type'            => 'bar',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Service',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'week',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'year',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
            'translation_key'       => 'service',
        ];

        $chart4 = new LaravelChart($settings4);

        $settings5 = [
            'chart_title'           => 'heti e',
            'chart_type'            => 'pie',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Service',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'week',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'year',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
            'translation_key'       => 'service',
        ];

        $chart5 = new LaravelChart($settings5);

        $settings6 = [
            'chart_title'           => 'Éves kettő',
            'chart_type'            => 'bar',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Service',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'year',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'year',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
            'translation_key'       => 'service',
        ];

        $chart6 = new LaravelChart($settings6);

        return view('home', compact('chart1', 'chart2', 'chart3', 'chart4', 'chart5', 'chart6'));
    }
}
