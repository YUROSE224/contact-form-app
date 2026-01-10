<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AuthController extends Controller
{
    public function admin(Request $request){
        $query = Contact::with('category');

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('last_name', 'like', "%{$keyword}%")
                ->orWhere('first_name', 'like', "%{$keyword}%")
                ->orWhereRaw("CONCAT(last_name, first_name) like ?", ["%{$keyword}%"])
                ->orWhereRaw("CONCAT(last_name, ' ', first_name) like ?", ["%{$keyword}%"])
                ->orWhere('email', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('gender')) {
        $query->where('gender', $request->gender);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->Paginate(7);
        $categories = Category::all();

        return view('admin', [
            'contacts' => $contacts,
            'categories' => $categories,
        ]);
    }

    public function destroy($id){
    Contact::find($id)->delete();
    return redirect('/admin');
    }
}