<?php

namespace App\Http\Controllers;

use App\Education;
use App\Employee;
use App\Position;
use App\Status;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard',[
            'c_employee' => Employee::count(),
            'c_education' => Education::count(),
            'c_position' => Position::count(),
            'c_status' => Status::count()
        ]);
    }
}
