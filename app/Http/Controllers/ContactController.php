<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;


class ContactController extends Controller
{
    public function index()
    {
        return view("contact");
    }

    // public function send(Request $request)
    // {
    //     // Validate the form data
    //     $data = $request->validate([
    //         'email' => 'required|email',
    //         'name' => 'required|min:3',
    //         'message' => 'required|min:10',
    //     ]);

    //     // Send email
    //     try {
    //         Mail::to ('hasnainalikhan@gmail.com')->send(new ContactMail($data));
    //         return redirect()->back()->with('success', 'Email sent successfully!');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'An error occurred while sending the email.');
    //     }
    // }

}
