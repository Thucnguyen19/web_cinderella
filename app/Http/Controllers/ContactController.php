<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Slider;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function show_contact()
    {
        $currentPage = '';
        $sliders = Slider::latest()->get();
        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();
        $categories = Category::where('parent_id', 0)->get(); //lấy tất cả parent_id =0 là get , lấy 1 là firt
        return view('front-end.contact.contact', compact('currentPage', 'categoriesLimit', 'categories', 'sliders'));
    }
    function send_contact(Request $request)
    {
        $currentPage = '';
        $sliders = Slider::latest()->get();
        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();
        $categories = Category::where('parent_id', 0)->get(); //lấy tất cả parent_id =0 là get , lấy 1 là firt
        $dataInsertContact = [
            'name' => $request->name_contact,
            'email' => $request->email_contact,
            'phone' => $request->phone_contact,
            'subject' => $request->subject_contact,
            'content' => $request->content_contact
        ];
        Contact::create($dataInsertContact);
        return view('front-end.contact.send_contact', compact('currentPage', 'categoriesLimit', 'categories', 'sliders'));
    }
}
