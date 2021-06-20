<?php

namespace App\Http\Controllers;

use App\Models\Button;
use Illuminate\Http\Request;

class ButtonController extends Controller
{
    public function button(){
        return view('backend.button.button', [
            'buttons' => Button::orderBy('id', 'desc')->get()
        ]);
    }

    public function buttonStore(Request $request){
        $buttons= new Button;
        $buttons->button_name = $request->button_name;
        $buttons->button_link = $request->button_link;
        $buttons->button_icon = $request->button_icon;
        $buttons->save();

        $notification = array(
            'message' => 'Button Create Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function buttonEdit($id){
        return view('backend.button.edit', [
            'button' => Button::findOrFail($id),
        ]);
    }

    public function buttonUpdate(Request $request){
        $button = Button::findOrFail($request->id);
        $button->button_name = $request->button_name;
        $button->button_link = $request->button_link;
        $button->button_icon = $request->button_icon;
        $button->save();

        $notification = array(
            'message' => 'Button Update Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
