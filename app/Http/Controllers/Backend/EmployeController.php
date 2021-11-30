<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class EmployeController extends Controller
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
        
        $employes = User::where('type_user', '3')->get();
        if(is_null($request->get('search'))) {
            return view('employes.index',[
                'employes' => $employes,
            ])->with('message', 'de quoi tu recherche');
        } else {
            switch ($request->get('selector')) {
                case 'username':
                    $employes = User::where('type_user', '3')
                        ->where('username', 'like', "%{$request->search}%")
                        ->get();
                    $empUsername = true;
                    return view('employes.index',[
                        'employes' => $employes,
                        'empUsername' => $empUsername,
                    ]);
                case 'first_name':
                    $employes = User::where('type_user', '3')
                        ->Where('first_name', 'like', "%{$request->search}%")
                        ->get();
                    return view('employes.index',[
                        'employes' => $employes,
                    ]);
                case 'last_name':
                    $employes = User::where('type_user', '3')
                        ->Where('last_name', 'like', "%{$request->search}%")
                        ->get();
                    return view('employes.index',[
                        'employes' => $employes,
                    ]);
                case 'birthday':
                    $employes = User::where('type_user', '3')
                        ->Where('birthday', 'like', "%{$request->search}%")
                        ->get();
                    $empBirthday = true;
                    return view('employes.index',[
                        'employes' => $employes,
                        'empBirthday' => $empBirthday,
                    ]);
                case 'birthplace':
                    $employes = User::where('type_user', '3')
                        ->Where('birthplace', 'like', "%{$request->search}%")
                        ->get();
                    $empBirthplace = true;
                    return view('employes.index',[
                        'employes' => $employes,
                        'empBirthplace' => $empBirthplace,
                    ]);
                case 'adress':
                    $employes = User::where('type_user', '3')
                        ->Where('adress', 'like', "%{$request->search}%")
                        ->get();
                    $empAdress = true;
                    return view('employes.index',[
                        'employes' => $employes,
                        'empAdress' => $empAdress,
                    ]);
                case 'phone':
                    $employes = User::where('type_user', '3')
                        ->Where('phone', 'like', "%{$request->search}%")
                        ->get();
                    $empPhone = true;
                    return view('employes.index',[
                        'employes' => $employes,
                        'empPhone' => $empPhone,
                    ]);
                case 'email':
                    $employes = User::where('type_user', '3')
                        ->Where('email', 'like', "%{$request->search}%")
                        ->get();
                    $empEmail = true;
                    return view('employes.index',[
                        'employes' => $employes,
                        'empEmail' => $empEmail,
                    ]);
                default:
                    return view('employes.index',[
                        'employes' => $employes,
                    ]);
            }
        }
    }

    public function create()
    {
        if (! Gate::allows('access-admin')) {
            abort(403);
        }
        
        return view('employes.create');
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
            'type_user' => 3,
            'adress' => $request->adress,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('employe.index')->with('message', 'employé ajouté avec succès');
    }

    public function show($id)
    {
        if (! Gate::allows('access-admin')) {
            abort(403);
        }
        
        $employe = User::findOrFail($id);
        return view('employes.information', [
            'employe' => $employe,
        ]);
    }

    public function edit(User $employe)
    {
        if (! Gate::allows('access-admin')) {
            abort(403);
        }
        
        return view('employes.edit',[
            'employe' => $employe,
        ]);
    }

    public function update(UserUpdateRequest $request, User $employe)
    {
        if (! Gate::allows('access-admin')) {
            abort(403);
        }
        
        $employe->update([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthday' => $request->birthday,
            'birthplace' => $request->birthplace,
            'type_user' => 3,
            'adress' => $request->adress,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return redirect()->route('employe.index')->with('message', 'employé modifié avec succès');
    }

    public function destroy(User $employe)
    {
        if (! Gate::allows('access-admin')) {
            abort(403);
        }
        
        $employe->delete();
        return redirect()->route('employe.index')->with('message', 'employé supprimé avec succès');
    }

    public function dashboard () 
    {
        if (! Gate::allows('access-admin')) {
            abort(403);
        }
        
        $nbr_employe = User::where('type_user', '3')->count();

        return view('dashboard', [
            'nbr_employe' => $nbr_employe,
        ]);
    }

    public function change_password (Request $request , User $employe) 
    {
        if (! Gate::allows('access-admin')) {
            abort(403);
        }
        
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $employe->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('employe.index')->with('message', 'Mot de pass changé');
    }

    public function editPassword (User $employe)
    {
        if (! Gate::allows('access-admin')) {
            abort(403);
        }
        
        return view('employes.edit_password', [
            'employe' => $employe,
        ]);
    }
}
