<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function homepage() { return view('dashboard_layout.homepage'); }
    public function calendar()      { return view('dashboard_layout.calendar'); }
    public function onlineClasses() { return view('dashboard_layout.online_classes'); }
    public function logoutPage()    { return view('dashboard_layout.logout'); }

    // READ
    public function chat()
    {
        $messages = Message::with('user')->latest()->take(50)->get()->reverse();
        return view('dashboard_layout.chat', compact('messages'));
    }

    // CREATE
    public function storeMessage(Request $request)
    {
        $data = $request->validate([
            'body' => 'required|string|max:500',
        ]);

        Message::create([
            'user_id' => Auth::id(),
            'body'    => $data['body'],
        ]);

        return redirect()->route('chat');
    }

    // DELETE (own messages only)
    public function destroyMessage(Message $message)
    {
        abort_unless($message->user_id === Auth::id(), 403);
        $message->delete();

        return redirect()->route('chat')->with('status', 'Message deleted.');
    }
}