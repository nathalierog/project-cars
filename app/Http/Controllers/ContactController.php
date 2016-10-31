<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\car;
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
            'message' => 'required|min:5|max:2500',
            'g-recaptcha-response' => 'required|recaptcha',
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

    public function reactForm(Request $request)
    {

        //Validation rules
        $this->validate($request, [
            'name' => 'required',
            'id' => 'required|exists:cars',
            'email' => 'required|email',
            'message' => 'required|min:5|max:2500',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);
        
        $name = $request->name;
        $email = $request->email;
        $content = $request->message;

        $car = car::find($request->id);

        $title = "Reactie op " . $car->brand ." ". $car->model;

        $data = array('name'=>$name, 'email'=>$email, 'content'=>$content, 'title'=>$title, 'car'=>$car);

        Mail::send(['emails.contact-react-mail','emails.plain.contact-react-mail'], $data, function ($message) use ($email, $name)
        {
            $message->to('contact@example.com')->replyTo($email, $name);
            $message->subject('Mail via website by ' . $name);

        });

        Mail::send(['emails.confirm-react-mail','emails.plain.confirm-react-mail'], $data, function ($message) use ($email, $name)
        {
            $message->to($email)->replyTo('contact@example.com', 'project-cars');
            $message->subject('Bevestiging van uw bericht op project-cars');

        });

        return back();  
    }
}