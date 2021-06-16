<?php

namespace App\Http\Controllers\dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorDasController extends Controller
{
    public $dashboardPath = 'dashboard.';

    public $pagePath='';


    public function __construct()
    {
        $this->data('userData',User::all());
        $this->pagePath = $this->dashboardPath .'pages.';
    }
}
