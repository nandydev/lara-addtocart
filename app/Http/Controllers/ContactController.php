<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;    

class ContactController extends Controller
{
    public function index(){
        $messages = Contact::all();
      
        return view('admin.messages', compact('messages'));
    }

    public function send(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message_content' => $request->message,
        ];

        Mail::send('emails.contact', $data, function($msg) use ($data) {
            $msg->to('wpdev1211@gmail.com')
                ->subject($data['subject']);
        });

        return redirect()->back()->with('success', 'Thank you for contacting us. We will get back to you shortly.');


    }
}
