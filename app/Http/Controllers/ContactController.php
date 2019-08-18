<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Contact::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new Contact($request->all());
        $contact->save();

        return Response::json($contact);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Contact::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        $contact->firstname = $request->firstname;
        $contact->firstname = $request->lastname;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->save();

        return Response::json($contact);
    }

    public function destroy(Contact $contact)
    {
        if ($contact->delete()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);

        }

    }
}
