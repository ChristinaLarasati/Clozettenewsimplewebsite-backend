<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactEmail;

class ContactController extends Controller {

    public function create() {
        
        return view('user.contact.create');
    }

    public function store(ContactFormRequest $request) {
        $contact = [];
        $contact['name'] = $request->get('name');
        $contact['email'] = $request->get('email');
        $contact['msg'] = $request->get('msg');        
        
        \Mail::send(new ContactEmail($contact));
        // Mail delivery logic goes here
        // flash('Your message has been sent!')->success();
        return redirect()->route('contact.create');
    }

}
