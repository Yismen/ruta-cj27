<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ContactsRequest;
use App\Http\Controllers\Controller;

use App\Contact;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Contact $contact)
    {
        $contacts = $contact
            ->whereUserId(auth()->user()->id)
            ->orWhere('public', 1)
            ->paginate(15);

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Contact $contact)
    {
        return view('contacts.create', compact('contact'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ContactsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Contact $contact, ContactsRequest $request)
    {
        $contact = auth()->user()->contacts()->create($request->all());

        return redirect()->route('admin.contacts.index')
            ->withSuccess("El contacto $contact->name ha sido creado de manera correcta!");
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        // return  $contact;
        return view('contacts.edit', compact('contact'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ContactsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Contact $contact, ContactsRequest $request)
    {
        // return $contact;
        $contact->update($request->all());

        return redirect()->route('admin.contacts.index')
            ->withSuccess("El contacto $contact->name ha sido actualizado de manera correcta!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->withWarning("Se ha eliminado el contacto $contact->name. ");
    }
}
