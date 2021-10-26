<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Notifications\MessageNotification;
use App\User;

class MessageController extends Controller
{
    public function contact(MessageRequest $request)
    {
        $user = new User();

        $user->email = 'rojasjahiker@email.com';
        $message = $request;

        $user->notify(new MessageNotification($message));
        return response()->json($message);
    }
}
