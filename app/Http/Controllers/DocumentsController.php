<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Crew;
use App\Http\Requests\StoredocumentsRequest;
use App\Http\Requests\UpdatedocumentsRequest;

class DocumentsController extends Controller
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
        $documents = Document::with('crew')->paginate(10);

        return view('documents.index')->with('documents',$documents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $crews = Crew::all();
        return view('documents.create')->with('crews',$crews);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredocumentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredocumentsRequest $request)
    {
        $request->validate([
            'code'              => ['required'],
            'name'              => ['required'],
            'document_number'   => ['required'],
            'date_issued'       => ['required', 'date'],
            'date_expiry'       => ['required','date'],
            'remarks'           => ['required','string'],
            'crew_id'           => ['required','exists:crews,id'],

        ]);

        $document = new Document();
        $document->code = $request->input("code");
        $document->name = $request->input("name");
        $document->document_number = $request->input("document_number");
        $document->date_issued = $request->input("date_issued");
        $document->date_expiry = $request->input("date_expiry");
        $document->remarks = $request->input("remarks");
        $document->crew_id = $request->get("crew_id");
        $document->save();

        return redirect('/documents');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documents = Document::with('crew')
                    ->where("id",$id)
                    ->get();

        return view('documents.show')->with('documents',$documents);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function edit(document $document)
    {
        $crews = Crew::all();
        return view('documents.edit')
                ->with('document',$document)
                ->with('crews',$crews);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedocumentsRequest  $request
     * @param  \App\Models\documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedocumentsRequest $request, document $document)
    {
        $request->validate([
            'code'              => ['required'],
            'name'              => ['required'],
            'document_number'   => ['required'],
            'date_issued'       => ['required', 'date'],
            'date_expiry'       => ['required','date'],
            'remarks'           => ['required','string'],
            'crew_id'           => ['required','exists:crews,id'],

        ]);


        $document->code = $request->input("code");
        $document->name = $request->input("name");
        $document->document_number = $request->input("document_number");
        $document->date_issued = $request->input("date_issued");
        $document->date_expiry = $request->input("date_expiry");
        $document->remarks = $request->input("remarks");
        $document->crew_id = $request->get("crew_id");
        $document->save();

        return redirect('/documents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document=Document::find($id);
        $document->delete();
        return redirect('/documents');
    }

    public function assignDocument($id)
    {
        $crews = Crew::where("id",$id)
                 ->get();

        return view('documents.create')->with('crews',$crews);
    }



}
