<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Http\Requests\StorecrewsRequest;
use App\Http\Requests\UpdatecrewsRequest;

class CrewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecrewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecrewsRequest $request)
    {
        $request->validate([
            'firstname'         => ['required', 'alpha','string'],
            'lastname'          => ['required', 'alpha','string'],
            'middlename'        => ['required', 'alpha','string'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address'           => ['required','string'],
            'education'         => ['required','string'],
            'contact_details'   => ['required','string'],

        ]);

        $crew = new Crew();
        $crew->firstname = $request->input("firstname");
        $crew->lastname = $request->input("lastname");
        $crew->middlename = $request->input("middlename");
        $crew->email = $request->input("email");
        $crew->address = $request->input("address");
        $crew->education = $request->input("education");
        $crew->contact_details = $request->input("contact_details");
        $crew->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\crews  $crews
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crews = Crew::select("firstname","lastname","middlename","email","address","education","contact_details")
                    ->where("id",$id)
                    ->get();

        return view('crews.show')->with('crews',$crews);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\crews  $crews
     * @return \Illuminate\Http\Response
     */
    public function edit(crew $crew)
    {
        //
        return view('crews.edit')->with('crew',$crew);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecrewsRequest  $request
     * @param  \App\Models\crews  $crews
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecrewsRequest $request, crew $crew)
    {

        $request->validate([
            'firstname'         => ['required', 'alpha','string'],
            'lastname'          => ['required', 'alpha','string'],
            'middlename'        => ['required', 'alpha','string'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address'           => ['required','string'],
            'education'         => ['required','string'],
            'contact_details'   => ['required','string'],

        ]);

        $crew->firstname = $request->input("firstname");
        $crew->lastname = $request->input("lastname");
        $crew->middlename = $request->input("middlename");
        $crew->email = $request->input("email");
        $crew->address = $request->input("address");
        $crew->education = $request->input("education");
        $crew->contact_details = $request->input("contact_details");
        $crew->save();

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\crews  $crews
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crew=crew::find($id);
        $crew->delete();
        return redirect('/home');
    }
}
