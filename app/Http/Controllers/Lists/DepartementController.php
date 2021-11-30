<?php

namespace App\Http\Controllers\Lists;

use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartementStoreRequest;

class DepartementController extends Controller
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
            $departements = Departement::all();
            return view('lists.departement.departement', [
                'departements' => $departements,
            ]);
        } else {
            switch ($request->get('selector')) {
                case 'name':
                    $departements = Departement::where('name', 'like', "%{$request->search}%")->get();
                    return view('lists.departement.departement', [
                        'departements' => $departements,
                    ]);
                case 'short_name':
                    $departements = Departement::where('short_name', 'like', "%{$request->search}%")->get();
                    return view('lists.departement.departement', [
                        'departements' => $departements,
                    ]);
                default:
                    $departements = [];
                    return view('lists.departement.departement', [
                        'departements' => $departements,
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
        return view('lists.departement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartementStoreRequest $request)
    {
        Departement::create($request->validated());
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
    public function edit(Departement $departement)
    {
        return view('lists.departement.edit', [
            'departement' => $departement,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartementStoreRequest $request, Departement $departement)
    {
        $departement->update(
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
