<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function getHome()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.home')->with('posts', $posts);
    }

    public function getAbout()
    {
        return view('pages.about');
    }

    public function getContact()
    {
        return view('pages.contact');
    }

    public function postContact(Request $request)
    {
        $mail = new \App\Mail\ContactMail($request->content);
        $mail->from($request->email);
        $mail->to(config('mail.from.address'));
        $mail->subject($request->subject);
        Mail::send($mail);
        $request->session()->flash('success', 'The mail was successfully sent ^^');
        return redirect('/');
    }
}
