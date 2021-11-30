<?php

namespace App\Http\Controllers\Lists;

use App\Models\Specialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialiteStoreRequest;

class SpecialiteController extends Controller
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
            $specialites = Specialite::all();
            return view('lists.specialite.specialite', [
                'specialites' => $specialites,
            ]);
        } else {
            switch ($request->get('selector')) {
                case 'name':
                    $specialites = Specialite::where('name', 'like', "%{$request->search}%")->get();
                    return view('lists.specialite.specialite', [
                        'specialites' => $specialites,
                    ]);
                case 'short_name':
                    $specialites = Specialite::where('short_name', 'like', "%{$request->search}%")->get();
                    return view('lists.specialite.specialite', [
                        'specialites' => $specialites,
                    ]);
                default:
                    $specialites = [];
                    return view('lists.specialite.specialite', [
                        'specialites' => $specialites,
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
        return view('lists.specialite.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecialiteStoreRequest $request)
    {
        Specialite::create($request->validated());
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
    public function edit(Specialite $specialite)
    {
        return view('lists.specialite.edit',[
            'specialite' => $specialite,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SpecialiteStoreRequest $request, Specialite $specialite)
    {
        $specialite->update(
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
