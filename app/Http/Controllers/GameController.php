<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;

class GameController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }

    public function index()
    {
        return view('game');
    }

    public function send(Request $request)
    {
        $message = $request->input('message');
        event(new GameMessageSent($message));
        return response('Message sent');
    }
}
