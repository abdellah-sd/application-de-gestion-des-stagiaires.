<?php

namespace App\Http\Controllers\Lists;

use App\Models\Universite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UniversiteStoreRequest;

class UniversiteController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (is_null($request->get('search'))) {
            $universites = Universite::all();
            return view('lists.universite.universite', [
                'universites' => $universites,
            ]);
        } else {
            switch ($request->get('selector')) {
                case 'name':
                    $universites = Universite::where('name', 'like', "%{$request->search}%")->get();
                    return view('lists.universite.universite', [
                        'universites' => $universites,
                    ]);
                case 'short_name':
                    $universites = Universite::where('short_name', 'like', "%{$request->search}%")->get();
                    return view('lists.universite.universite', [
                        'universites' => $universites,
                    ]);
                case 'location':
                    $universites = Universite::where('location', 'like', "%{$request->search}%")->get();
                    return view('lists.universite.universite', [
                        'universites' => $universites,
                    ]);
                default:
                    $universites = [];
                    return view('lists.universite.universite', [
                        'universites' => $universites,
                    ]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(  )
    {
        return view('lists.universite.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UniversiteStoreRequest $request)
    {
        Universite::create($request->validated());
        return redirect()->route('stagiaire.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Universite $universite )
    {
        return view('lists.universite.edite', [
            'universite' => $universite,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UniversiteStoreRequest $request, Universite $universite)
    {
        $universite->update(
            $request->validated()
        );
        return redirect()->route('stagiaire.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
