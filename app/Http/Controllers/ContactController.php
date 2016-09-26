<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;

class ContactController extends Controller
{
    public function getContactForm(Request $request)
    {

        //Validation rules
        $this->validate($request, [
    		'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:5',
            'message' => 'required|min:5'
		]);
		
        $name = $request->name;
        $email = $request->email;
        $title = $request->subject;
        $content = $request->message;

        $data = array('name'=>$name, 'email'=>$email, 'content'=>$content, 'title'=>$title);

		Mail::send('emails.contact-mail', $data, function ($message) use ($email, $name)
        {
            $message->from('contact@jwhuisman.nl', 'Website');
            $message->to('contact@jwhuisman.nl')->replyTo($email, $name);
            $message->subject('Mail via website by ' . $name);

        });

        return response()->json(['message' => 'Request completed']);		
    }
}