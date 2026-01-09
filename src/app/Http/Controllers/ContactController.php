<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contacts = $request->only([
            'last_name',
            'first_name',
            'gender',
            'email',
            'phone1',
            'phone2',
            'phone3',
            'address',
            'building',
            'category_id',
            'detail',
        ]);
        $request->session()->put('contacts', $contacts);
        $category = Category::find($contacts['category_id']);
        return view('confirm', compact('contacts', 'category'));
    }

    public function store(Request $request)
    {
        $contacts = $request->session()->get('contacts');
        ([
            'last_name',
            'first_name',
            'gender',
            'email',
            'address',
            'building',
            'category_id',
            'detail',
        ]);
        $contacts['tel'] = $contacts['phone1'] . $contacts['phone2'] . $contacts['phone3'];
        Contact::create($contacts);
        return view('thanks');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function login(){
        return view('auth.login');
    }

}

