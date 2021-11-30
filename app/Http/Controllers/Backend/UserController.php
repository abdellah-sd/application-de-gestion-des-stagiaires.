<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $nbr_rsp = User::where('type_user', '2')->count();
        $nbr_responsable = User::where('type_user', '2')
                                ->select(DB::raw("COUNT(*) as count"))
                                ->whereYear('created_at', date('Y'))
                                ->groupBy(DB::raw("Month(created_at)"))
                                ->pluck('count');
        // ->count();
        $nbr_emp = User::where('type_user', '3')->count();
        $nbr_employe = User::where('type_user', '3')
                                ->select(DB::raw("COUNT(*) as count"))
                                ->whereYear('created_at', date('Y'))
                                ->groupBy(DB::raw("Month(created_at)"))
                                ->pluck('count');
        // ->count();
        $nbr_stg = Stagiaire::count();
        $nbr_stagiaire = Stagiaire::select(DB::raw("COUNT(*) as count"))
                                ->whereYear('created_at', date('Y'))
                                ->groupBy(DB::raw("Month(created_at)"))
                                ->pluck('count');
        // count();

        $nbr_stagiaire_valide = Stagiaire::where('memoire', '1')
                                ->count();

        $date = Carbon::now()->toDateString();
        $nbr_stagiaire_enCours = Stagiaire::where('memoire', '0')
                                ->whereDate('date_debut', '<',$date)
                                ->whereDate('date_fin', '>=', $date)
                                ->count();

        $nbr_stagiaire_refuse = $nbr_stg-($nbr_stagiaire_valide+$nbr_stagiaire_enCours);

        $months = User::select(DB::raw("Month(created_at) as month"))
                                ->whereYear('created_at', date('Y'))
                                ->groupBy(DB::raw("Month(created_at)"))
                                ->pluck('month');

        // $totale = $nbr_responsable

        // dd($nbr_responsable);
        $stagiaires_datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ( $months as $index => $month)
        {
            if (! isset($nbr_stagiaire[$index])){
                $nbr_stagiaire[$index] = 0;
            }
            $stagiaires_datas[$month] = $nbr_stagiaire[$index];
        }
        // dd ($datas);
        
        return view('dashboard', [
            'nbr_rsp' => $nbr_rsp,
            'nbr_emp' => $nbr_emp,
            'nbr_stg' => $nbr_stg,
            'nbr_responsable' => $nbr_responsable,
            'nbr_employe' => $nbr_employe,
            'nbr_stagiaire' => $nbr_stagiaire,
            'nbr_stagiaire_valide' => $nbr_stagiaire_valide,
            'nbr_stagiaire_enCours' => $nbr_stagiaire_enCours,
            'nbr_stagiaire_refuse' => $nbr_stagiaire_refuse,
            'stagiaires_datas' => $stagiaires_datas,
        ]);
    }

    public function create()
    {
        if (! Gate::allows('access-admin')) {
            abort(403);
        }
        
        return view('addAdmin');
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
            'type_user' => 1,
            'adress' => $request->adress,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('message', 'employé ajouté avec succès');
    }

    
}
