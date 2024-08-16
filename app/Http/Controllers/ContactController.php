<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        }

        if ($request->filled('sort')) {
            $sort = $request->input('sort');

            if ($sort == 'name') {
                $query->orderBy('name', 'asc');
            } elseif ($sort == 'created_at') {
                $query->orderBy('created_at', 'desc');
            }
        }

        $data['contacts'] = $query->get();

        return view('index', $data);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->address = $request->input('address');
        $contact->save();
        
        return redirect()->route('contacts.index');
    }

    public function edit($id)
    {
        $data['contact'] = Contact::where('id', $id)->first();
        return view('edit', $data);
    }

    public function update(Request $request)
    {

        $contact = Contact::where('id', $request->id)->first();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->address = $request->input('address');
        $contact->save();

        return redirect()->route('contacts.index');
    }
    public function destroy($id)
    {
        $contact = Contact::where('id', $id)->first();
        $contact->delete();
        return redirect()->route('contacts.index');
    }
    public function show($id)
    {
        $data['contact'] = Contact::where('id', $id)->first();
        return view('show', $data);
    }

}
