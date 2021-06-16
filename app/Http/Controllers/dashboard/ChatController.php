<?php

namespace App\Http\Controllers\dashboard;

use App\ChatMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ChatController extends DoctorDasController
{
    public function showChat(){
        $userName = Auth::guard('doctor')->user()->name;
        $this->data('doctorData', $userName);
        return view( 'dashboard.pages.chat.show-chat',$this->data);
    }

    public function messageSend(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->route('');
        }
        if ($request->isMethod('post')) {
            $data['sender_user_id'] = $request->username;
            $data['message'] = $request->message;
            $data['read'] = 0;
            if (ChatMessage::create($data)) {
                return Response::json(['success' => 'send'], 200);
            }
        }

    }

    public function retrieveChatMessages(Request $request)
    {

        if ($request->isMethod('get')) {
            return false;
        }
        if ($request->isMethod('post')) {
            $username = $request->username;

            $message = ChatMessage::where('sender_user_id', '!=', $username)->where('read', '=', false)->first();
            $mess = ChatMessage::where('sender_user_id', '!=', $username)->where('read', '=', false)->count();


            if (count($message)>0) {
                $message->read = 1;
                $message->update();
                return $message->message;
            }

        }

    }

}
