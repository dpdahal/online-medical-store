<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends FrontendController
{
   public function aboutUs(){
       return view('frontend.pages.about.about-us',$this->data);
   }
}
