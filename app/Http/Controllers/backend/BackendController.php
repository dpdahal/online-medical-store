<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
   public $backendPath = 'backend.';

   public $pagePath='';


   public function __construct()
   {
       $this->pagePath = $this->backendPath .'pages.';
   }

}
