<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AuthController extends Controller
{
    public function admin(Request $request)
    {
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

        $contacts = $query->paginate(7);
        $categories = Category::all();

        return view('admin', [
            'contacts' => $contacts,
            'categories' => $categories,
        ]);
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect('/admin');
    }

    public function export(Request $request)
{
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

    $contacts = $query->get();

    $csvHeader = ['お名前', '性別', 'メールアドレス', '電話番号', '住所', '建物名', 'お問い合わせの種類', 'お問い合わせ内容'];

    $csvData = $contacts->map(function ($contact) {
        return [
            $contact->last_name . ' ' . $contact->first_name,
            $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他'),
            $contact->email,
            $contact->tel,
            $contact->address,
            $contact->building,
            $contact->category->content,
            $contact->detail,
        ];
    });

    $callback = function () use ($csvHeader, $csvData) {
        $file = fopen('php://output', 'w');
        fwrite($file, "\xEF\xBB\xBF");
        fputcsv($file, $csvHeader);
        foreach ($csvData as $row) {
            fputcsv($file, $row);
        }
        fclose($file);
    };

    $filename = 'contacts_' . date('Ymd_His') . '.csv';

    return response()->stream($callback, 200, [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"',
    ]);
}
}