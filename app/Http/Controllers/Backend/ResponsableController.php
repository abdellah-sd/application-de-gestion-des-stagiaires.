<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;


class ResponsableController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if (! Gate::allows('access-admin')) {
            abort(403);
        }

        $responsables = User::where('type_user', '2')->get();

        if(is_null($request->get('search'))) {
            return view('responsables.index',[
                'responsables' => $responsables,
            ])->with('message', 'de quoi tu recherche');
        } else {
            switch ($request->get('selector')) {
                case 'username':
                    $responsables = User::where('type_user', '2')
                        ->where('username', 'like', "%{$request->search}%")
                        ->get();
                    $respUsername = true;
                    return view('responsables.index',[
                        'responsables' => $responsables,
                        'respUsername' => $respUsername,
                    ]);
                case 'first_name':
                    $responsables = User::where('type_user', '2')
                        ->Where('first_name', 'like', "%{$request->search}%")
                        ->get();
                    return view('responsables.index',[
                        'responsables' => $responsables,
                    ]);
                case 'last_name':
                    $responsables = User::where('type_user', '2')
                        ->Where('last_name', 'like', "%{$request->search}%")
                        ->get();
                    return view('responsables.index',[
                        'responsables' => $responsables,
                    ]);
                case 'birthday':
                    $responsables = User::where('type_user', '2')
                        ->Where('birthday', 'like', "%{$request->search}%")
                        ->get();
                    $respBirthday = true;
                    return view('responsables.index',[
                        'responsables' => $responsables,
                        'respBirthday' => $respBirthday,
                    ]);
                case 'birthplace':
                    $responsables = User::where('type_user', '2')
                        ->Where('birthplace', 'like', "%{$request->search}%")
                        ->get();
                    $respBirthplace = true;
                    return view('responsables.index',[
                        'responsables' => $responsables,
                        'respBirthplace' => $respBirthplace,
                    ]);
                case 'adress':
                    $responsables = User::where('type_user', '2')
                        ->Where('adress', 'like', "%{$request->search}%")
                        ->get();
                    $respAdress = true;
                    return view('responsables.index',[
                        'responsables' => $responsables,
                        'respAdress' => $respAdress,
                    ]);
                case 'phone':
                    $responsables = User::where('type_user', '2')
                        ->Where('phone', 'like', "%{$request->search}%")
                        ->get();
                    $respPhone = true;
                    return view('responsables.index',[
                        'responsables' => $responsables,
                        'respPhone' => $respPhone,
                    ]);
                case 'email':
                    $responsables = User::where('type_user', '2')
                        ->Where('email', 'like', "%{$request->search}%")
                        ->get();
                    $respEmail = true;
                    return view('responsables.index',[
                        'responsables' => $responsables,
                        'respEmail' => $respEmail,
                    ]);
                default:
                    return view('responsables.index',[
                        'responsables' => $responsables,
                    ]);
            }
        }        
    }

    public function create()
    {
        if (! Gate::allows('access-admin')) {
            abort(403);
        }

        return view('responsables.create');
    }

    public function store(UserStoreRequest $request)
    {
        if (! Gate::allows('access-admin')) {
            abort(403);
        }

        User::create([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthday' => $request->birthday,
            'birthplace' => $request->birthplace,
            'type_user' => 2,
            'adress' => $request->adress,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('responsable.index')->with('message', 'responsable ajouté avec succès');
    }

    public function show($id)
    {
        if (! Gate::allows('access-admin')) {
            abort(403);
        }
        
        $responsable = User::findOrFail($id);
        return view('responsables.information', [
            'responsable' => $responsable,
        ]);
    }

    public function edit(User $responsable)
    {
        if (! Gate::allows('access-admin')) {
            abort(403);
        }
        
        return view('responsables.edit',[
            'responsable' => $responsable,
        ]);
    }

    public function update(UserUpdateRequest $request, User $responsable)
    {
        if (! Gate::allows('access-admin')) {
            abort(403);
        }
        
        $responsable->update([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthday' => $request->birthday,
            'birthplace' => $request->birthplace,
            'type_user' => 2,
            'adress' => $request->adress,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return redirect()->route('responsable.index')->with('message', 'Responsable modifié avec succès');
    }

    public function destroy(User $responsable)
    {
        if (! Gate::allows('access-admin')) {
            abort(403);
        }
        
        $responsable->delete();

        return redirect()->route('responsable.index')->with('message', 'Responsable supprimé avec succés');
    }

    public function dashboard ()
    {
        if (! Gate::allows('access-admin')) {
            abort(403);
        }
        
        $nbr_responsable = User::where('type_user', '2')->count();

        return view('dashboard', [
            'nbr_responsable' => $nbr_responsable
        ]);
    }

    public function statistics () 
    {
        if (! Gate::allows('access-responsable')) {
            abort(403);
        }
        
        return view('statistics');
    }

    public function change_password (Request $request , User $responsable) 
    {
        if (! Gate::allows('access-admin')) {
            abort(403);
        }
        
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $responsable->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('responsable.index')->with('message', 'Mot de pass changé');
    }

    public function editPassword (User $responsable)
    {
        if (! Gate::allows('access-admin')) {
            abort(403);
        }
        
        return view('responsables.edit_password', [
            'responsable' => $responsable,
        ]);
    }
}
