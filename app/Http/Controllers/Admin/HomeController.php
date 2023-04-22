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

    $transactions = Transaction::with('service.user')
    ->selectRaw('service_id, sum(price) as total, MONTH(created_at) as month, YEAR(created_at) as year')
    ->groupBy('service_id', 'month', 'year')
    ->get();

    $chartData = [];
    foreach ($transactions as $transaction) {
    $employee = $transaction->service->user->fullName;
    $monthYear = Carbon::create($transaction->year, $transaction->month, 1)->format('Y-m');
    $chartData[$employee][$monthYear] = $transaction->total;
    }

// Létrehozni a diagramot
$settings = [
    'chart_title' => 'Dolgozók havi aggregált munkaideje',
    'chart_type' => 'bar',
    'report_type' => 'group_by_string',
    'model' => 'App\Models\Transaction',
    'group_by_field' => 'service_id',
    'aggregate_function' => 'sum',
    'aggregate_field' => 'amount',
    'chart_data' => $chartData,
    'column_class' => 'col-md-10',
];

$chart1 = new LaravelChart($settings);
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
            'chart_title'           => 'Havi',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Service',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'month',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'year',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
            'translation_key'       => 'service',
        ];

        $chart2 = new LaravelChart($settings2);

        $settings3 = [
            'chart_title'           => 'Éves',
            'chart_type'            => 'line',
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
