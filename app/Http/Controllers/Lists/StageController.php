<?php

namespace App\Http\Controllers\Lists;

use App\Models\Stage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StageStoreRequest;

class StageController extends Controller
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
            $stages = Stage::all();
            return view('lists.stage.stage', [
                'stages' => $stages,
            ]);
        } else {
            switch ($request->get('selector')) {
                case 'theme':
                    $stages = Stage::where('theme', 'like', "%{$request->search}%")->get();
                    return view('lists.stage.stage', [
                        'stages' => $stages,
                    ]);
                default:
                $stages = [];
                return view('lists.stage.stage', [
                    'stages' => $stages,
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
        return view('lists.stage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StageStoreRequest $request)
    {

        Stage::create([
            'theme' => $request->theme,
        ]);
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
    public function edit(Stage $stage)
    {
        return view('lists.stage.edit',[
            'stage' => $stage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StageStoreRequest $request, Stage $stage)
    {
        $stage->update(
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
