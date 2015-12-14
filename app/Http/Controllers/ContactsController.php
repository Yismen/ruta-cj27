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

    /**
     * Allows to search contacts by db indexes 
     * @param  Request $request [description]
     * @param  User    $users   [description]
     * @return [type]           [description]
     */
    public function search(Request $request, Contact $contacts)
    {
        $searchs = explode(' ', $request->get('search'));

        foreach ($searchs as $key => $value) {
            $contacts = $contacts
                ->orWhere('name', 'like', "%$value%")
                ->orWhere('mobile', 'like', "%$value%")
                ->orWhere('secondary', 'like', "%$value%")
                ->orWhere('email', 'like', "%$value%")
                ->orWhere('address', 'like', "%$value%")
                ;
        }

        $contacts = $contacts->paginate(10)->appends(['search' => $request->get('search')]);
        
        $request->flash();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Save a main image for this contact
     * @param  Request $request user inputs and request
     * @param  Contact $contact current contact
     * @return [type]           [description]
     */
    public function postImage(Request $request, Contact $contact, $id)
    {
        $this->validate($request, [
            'photo' => 'required|image|max:4000',
        ]);
        $contact = $contact->find($id);

        $file = $request->file('photo');
        $localPath = 'images/contacts/'; // local folder where the image will be loaded to
        $fileName = sha1($contact->id . $contact->name); // $fileName = str_random(40); //username sha1ed, so it is unique
        $extension = "." . $file->getClientOriginalExtension(); // $fileName = str_random(40); //username sha1ed, so it is unique
        $extendedName = $localPath . $fileName . $extension;

        $img = \File::get($file);

        $save = \File::put($extendedName, $img);

        if ($save) {

            $contact->photo = $extendedName;
            $contact->update();

        } else {
            return dd($save);
        }       

        if ($request->ajax()) {
            return response()->json([
                'success' => 1, 
                'data' => $contact
            ]);
        }

        return redirect()->route('admin.contacts.edit', $contact->id)
            ->withSuccess("Main image updated...");
    }
}
