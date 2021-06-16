<?php

namespace App\Http\Controllers\backend;

use App\Subscribe;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscribeController extends Controller
{
    public function showSubscribe()
    {
        $this->data('subscribeData', Subscribe::orderBy('id', 'DESC')->get());
        return view( 'backend.pages.subscribe.show-subscribe', $this->data);
    }

    public function subscribeDelete(Request $request)
    {
        $id = $request->id;
        $subscribe = Subscribe::findOrFail($id);
        if ($subscribe->delete()) {
            return redirect()->route('show-subscribe')->with('success', 'subscribe was deleted');
        }
    }
}
