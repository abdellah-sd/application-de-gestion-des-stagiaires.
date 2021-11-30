<?php

namespace App\Http\Controllers\Lists;

use App\Models\Encadreur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EncadreurStoreRequest;

class EncadreurController extends Controller
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
            $encadreurs = Encadreur::all();
            return view('lists.encadreur.encadreur', [
                'encadreurs' => $encadreurs,
            ]);
        } else {
            switch ($request->get('selector')) {
                case 'name':
                    $encadreurs = Encadreur::where('name', 'like', "%{$request->search}%")->get();
                    return view('lists.encadreur.encadreur', [
                        'encadreurs' => $encadreurs,
                    ]);
                case 'last_name':
                    $encadreurs = Encadreur::where('last_name', 'like', "%{$request->search}%")->get();
                    return view('lists.encadreur.encadreur', [
                        'encadreurs' => $encadreurs,
                    ]);
                default:
                $encadreurs = [];
                return view('lists.encadreur.encadreur', [
                    'encadreurs' => $encadreurs,
                ]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lists.encadreur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EncadreurStoreRequest $request)
    {
        Encadreur::create($request->validated());
        return redirect()->route('stagiaire.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Encadreur $encadreur)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Encadreur $encadreur)
    {
        return view('lists.encadreur.edit', [
            'encadreur' => $encadreur,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EncadreurStoreRequest $request, Encadreur $encadreur)
    {
        $encadreur->update(
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
