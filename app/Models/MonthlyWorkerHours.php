<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyWorkerHours extends Model
{
    use HasFactory;

    protected $table = 'monthly_worker_hours';

    protected $fillable = [
        'worker_name',
        'total_hours',
        'month',
    ];

    protected $dates = [
        'month',
    ];
}
