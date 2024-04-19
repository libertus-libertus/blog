<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactMessage() {
        $messages = Contact::latest()->get();
        return view('admin.message.messages', compact('messages'));
    }

    public function contactPage() {
        return view('frontend.contact');
    }

    public function storeMessage(Request $request) {
        $request->validate(
        [
            'username' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ],
        [
            'username.required' => 'Username is required',
            'email.required' => 'Email is required',
            'subject.required' => 'Subject is required',
            'phone.required' => 'Phone is required',
            'message.required' => 'Message is required',
        ]);

        Contact::insert([
            'username' => $request->username,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Your message has been submited',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function deleteMessage($id) {
        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Message has been deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
