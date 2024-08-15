<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        if($search){
            $contacts = Contact::where('name', 'LIKE', '%'.$search.'%')
                        ->orWhere('email', 'LIKE', '%'.$search.'%')
                        ->orWhere('phone', 'LIKE', '%'.$search.'%')
                        ->orWhere('address', 'LIKE', '%'.$search.'%')
                        ->paginate(4);
        } else {
            $contacts = Contact::paginate(3);
        }
        if($request->get('clear')){
            return redirect()->route('contacts.index');
        }
       

        $filterValue = $request->input('filter');
        $data = Contact::where('name', $filterValue)->get();
        return view('contacts.index', compact('contacts','data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {//insert
        $request->validate([
            'name' =>'required|max:255',
            'email' =>'required|email|max:255|unique:contacts',
            'phone' =>'required|min:11',
            'address' =>'required|max:255',
        ]); 

        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        $viewAll=Contact::all();

        return view('contacts.view', compact('contact','viewAll'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' =>'required|max:255',
            'email' =>'required|email|max:255|unique:contacts,email,'.$contact->id,
            'phone' =>'required|max:255',
            'address' =>'required|max:255',
            ]);
            $contact->update($request->all());
            return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
