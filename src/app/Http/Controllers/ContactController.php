<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
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
            'content',
            'detail',
        ]);

        return view('confirm', compact('contacts'));
    }

    public function store(ContactRequest $request)
    {
        $contacts = $request->only
        ([
            'last_name',
            'first_name',
            'gender',
            'email',
            'address',
            'building',
            'content',
            'detail',
        ]);
        $contacts['tel'] = $request->phone1 . $request->phone2 . $request->phone3;
        Contact::create($contacts);
        return view('thanks');
    }
}
