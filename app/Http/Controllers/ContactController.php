<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string|min:10|max:1000',
        ]);

        // Here you could send an email or save to DB
        return back()->with('success', '✅ Your message has been sent! We will get back to you soon.');
    }
}
