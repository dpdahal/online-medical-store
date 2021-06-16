<?php

namespace App\Http\Controllers\frontend;

use App\Category;
use App\News;
use App\Notice;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{

    public $frontendPath = 'frontend.';

    public $pagePath = '';


    public function __construct()
    {
        $noticeData = Notice::orderBy('id', 'DESC')->limit(3)->get();
        $this->data('noticeData', $noticeData);
        $limitNewsData = News::orderBy('id', 'DESC')->limit(3)->get();
        $this->data('limitNewsData', $limitNewsData);
        $this->data('catData', Category::all());
        $this->data('productData', Product::all());

        $this->pagePath = $this->frontendPath . 'pages.';
    }


}
