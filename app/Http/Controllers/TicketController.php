<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $data = [
                [
                    "name" => "Gyógytorna bérlet",
                    "price" => 70000,
                    "usableAmount" => 77000
                ],
                [
                    "name" => "Masszázs bérlet",
                    "price" => 80000,
                    "usableAmount" => 88000
                ]
        ];

        return response()->json($data);

    }
}
