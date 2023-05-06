<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crew;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $crews = Crew::select('id','firstname','lastname','middlename','email')
            ->orderBy('id', 'DESC')
            ->paginate(10);

            $crews1 = Crew::leftJoin('documents', function ($join) {
                $join->on('crews.id', '=', 'documents.crew_id');
            })
            ->select('crews.id', 'crews.firstname', 'crews.lastname', 'crews.middlename', 'crews.email', 'documents.name', 'documents.id as document_id')
            ->paginate(10);


        
        return view('home')->with('crews',$crews1);
    }
}
