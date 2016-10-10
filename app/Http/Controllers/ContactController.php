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
            'subject' => 'required|min:5|max:150',
            'message' => 'required|min:5|max:2500'
		]);
		
        $name = $request->name;
        $email = $request->email;
        $title = $request->subject;
        $content = $request->message;

        $data = array('name'=>$name, 'email'=>$email, 'content'=>$content, 'title'=>$title);

		Mail::send(['emails.contact-mail','emails.plain.contact-mail'], $data, function ($message) use ($email, $name)
        {
            $message->to('contact@example.com')->replyTo($email, $name);
            $message->subject('Mail via website by ' . $name);

        });

        Mail::send(['emails.confirm-mail','emails.plain.confirm-mail'], $data, function ($message) use ($email, $name)
        {
            $message->to($email)->replyTo('contact@example.com', 'project-cars');
            $message->subject('Bevestiging van uw bericht op project-cars');

        });

        return back();	
    }
}