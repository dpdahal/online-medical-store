<?php

namespace App\Http\Controllers\frontend;

use App\Banner;
use App\Brand;
use App\Category;
use App\News;
use App\Notice;
use App\Product;
use App\Subscribe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ApplicationController extends FrontendController
{

    public function index()
    {
        $this->data('bannerData', Banner::all());
        $this->data('brandData', Brand::all());
        $this->data('productData', Product::all());
        return view($this->pagePath . 'home.home', $this->data);
    }

    public function subscribePost(Request $request)
    {


        if ($request->isMethod('post')) {
            $this->validate($request, [
                'email' => 'required|email'

            ]);
            Subscribe::create($request->all());
            $message = 'You have sucessfully subscribe to the medical store';
            return Response::json(['success' => $message], 200);


        }


    }

    public function bannerDetails(Request $request)
    {
        $slug = $request->criteria;
        $bannerData = Banner::where('slug', '=', $slug)->first();
        $this->data('bannerData', $bannerData);
        return view($this->pagePath . 'banner.banner-details', $this->data);
    }


    public function showProductDetails($id)
    {
        die('test');
        $this->data('productdetails', Product::where('id', $id)->first());
        return view('product-details', $this->data);
    }

    public function notice(Request $request)
    {
        $noticeId = $request->criteria;
        if (empty($noticeId)) {
            return \redirect()->back();
        }

        $noticeResult = Notice::orderBy('id', 'DESC')->get();
        $this->data('noticeResult', $noticeResult);
        $noticeData = Notice::where('slug', '=', $request->criteria)->first();
        $this->data('getNoticeData', $noticeData);
        return view($this->pagePath . 'notice.notice-details', $this->data);

    }

    public function news()
    {
        $newsData = News::orderBy('id', 'DESC')->paginate(6);
        $this->data('newsData', $newsData);
        return view($this->pagePath . 'news.news', $this->data);
    }


    public function newsDetails(Request $request)
    {

        $criteria = $request->criteria;
        $newsData = News::where('slug', '=', $criteria)->first();
        $this->data('getNewsData', $newsData);

        return view($this->pagePath . 'news.news-details', $this->data);
    }

    public function userProfile()
    {
        return view($this->pagePath . 'users.profile',$this->data);
    }


}
