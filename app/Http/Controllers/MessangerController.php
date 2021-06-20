<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Message;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;

class MessangerController extends Controller
{
    public function messageStore(Request $request){
        $request->validate([
            'name' => ['required', 'min:4', 'max:30'],
            'phone' => ['required', 'numeric', 'min:10'],
            'email' => 'email:rfc,dns',
            'subject' => 'required',
            'message' => ['required',  'min:30', 'max:250']
        ]);

        // if ($valitation->fails()) {
        //     return redirect('/#contact')
        //                 ->withErrors($valitation)
        //                 ->withInput();
        // }

        $message = new Message;
        $message->name = $request->name;
        $message->phone = $request->phone;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();
        return redirect('/#contact')->with('sent-message', 'Messaage Send Successfully.');
    }

    public function contactIndex(){
        return view('backend.contact.contact-index', [
            'contacts' => Contact::get(),
        ]);
    }

    public function contactCreate(){
        return view('backend.contact.contact-create');
    }

    public function contactPost(Request $request){
        $contact = new Contact;
        $contact->phone_one = $request->phone_one;
        $contact->phone_two = $request->phone_two;
        $contact->email_one = $request->email_one;
        $contact->email_two = $request->email_two;
        $contact->address = $request->address;
        $contact->save();

        $notification = array(
            'message' => 'Contact Create Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }

    public function contactEdit($id){
        return view('backend.contact.contact-edit', [
            'contact'  => Contact::findOrFail($id)
        ]);
    }

    public function contactUpdate(Request $request){
        $contact = Contact::findOrFail($request->contact_id);
        $contact->phone_one = $request->phone_one;
        $contact->phone_two = $request->phone_two;
        $contact->email_one = $request->email_one;
        $contact->email_two = $request->email_two;
        $contact->address = $request->address;
        $contact->save();

        $notification = array(
            'message' => 'Contact Update Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $Contact
     * @return \Illuminate\Http\Response
     */

    public function contactDistroy(Contact $contact){
        $contact->delete();
        $notification = array(
            'message' => 'Contact Delete Successfully.',
            'alert-type' => 'success'
        );
        // Toastr Alert
        return back()->with($notification);
    }


}
