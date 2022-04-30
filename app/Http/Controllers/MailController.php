<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function send(Request $request)
    {   
        
        $request->validate([
            'name'=>'required',
            'email'=>'required|email:dns',
            'pesan' => 'required',
            ]);
            
        if($this->isOnline())
        {
            $maildata = [
                'recepient' => [$request->email, 'mbitan12@gmail.com'],
                'fromName' => $request->name,
                'fromEmail' => $request->email,
                'subject' => $request->name,
                'body' => $request->pesan
            ];
            \Mail::send('email-template', $maildata, function($message) use ($maildata){
                $message->to($maildata['recepient'])
                        ->from($maildata['fromEmail'],$maildata['fromName'])
                        ->subject($maildata['subject']);
            });

            return redirect()->back()->with('success','Email Sent!');
        }
        else{
            return redirect()->back()->withInput()->with('error', 'Check your internet connection');
        }
    }

    public function isOnline($site = "https://youtube.com/"){
        if(@fopen($site, "r"))
        {
            return true;
        }else{
            return false;
        }
    }
}
