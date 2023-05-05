<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $data = [
            "available_tickets" => [
                [
                    "name" => "Gyógytorna bérlet",
                    "price" => 70000,
                    "usableAmount" => 77000
                ],
                [
                    "name" => "Masszázs bérlet",
                    "price" => 70000,
                    "usableAmount" => 77000
                ]
            ]
        ];

        return response()->json($data);

    }
}
