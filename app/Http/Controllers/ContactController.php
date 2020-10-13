<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userId = auth()->user()->id;
        $contacts = Contact::where('user_id', $userId)->get();
        return view ('contacts.index', array('contacts' => $contacts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view ('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validcontact = $request->validate([
            'name' => "required",
            'tel' => "required",
            'email' => "required",

        ]);

        $contact = new Contact($validcontact);
        $contact->name = $_POST['name'];
        $contact->tel = $_POST['tel'];
        $contact->email = $_POST['email'];
        $contact->user_id = auth()->user()->id;
        $contact->save();

        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
        return view('contacts.edit',['contact' => $contact]);
       

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
        $validcontact = request()->validate([
            'name' => 'required',
            'tel' => 'required',
            'email' => 'required'
        ]);
        
        $contact->fill($validcontact);
        $contact->save();

        return redirect()->route('contacts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
       $contact->delete();

       return redirect()->route('contacts.index');

    }
}