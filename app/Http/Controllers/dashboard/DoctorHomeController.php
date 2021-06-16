<?php

namespace App\Http\Controllers\dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorHomeController extends DoctorDasController
{
    public function index(){
        $this->data('doctorData ',User::all());
        return view($this->pagePath.'home.home',$this->data);
    }
}
