<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

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
    public function index(User $user)
    {
        $nbr_rsp = User::where('type_user', '2')->count();
        $nbr_responsable = User::where('type_user', '2')
                                ->select(DB::raw("COUNT(*) as count"))
                                ->whereYear('created_at', date('Y'))
                                ->groupBy(DB::raw("Month(created_at)"))
                                ->pluck('count');
        
        $nbr_emp = User::where('type_user', '3')->count();
        $nbr_employe = User::where('type_user', '3')
                                ->select(DB::raw("COUNT(*) as count"))
                                ->whereYear('created_at', date('Y'))
                                ->groupBy(DB::raw("Month(created_at)"))
                                ->pluck('count');
        
        $nbr_stg = Stagiaire::count();
        $nbr_stagiaire = Stagiaire::select(DB::raw("COUNT(*) as count"))
                                ->whereYear('created_at', date('Y'))
                                ->groupBy(DB::raw("Month(created_at)"))
                                ->pluck('count');

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

        
        $stagiaires_datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ( $months as $index => $month)
        {
            if (! isset($nbr_stagiaire[$index])){
                $nbr_stagiaire[$index] = 0;
            }
            $stagiaires_datas[$month] = $nbr_stagiaire[$index];
        }

        switch (Auth()->user()->type_user) {
            case '1':
                return view('dashboard', [
                    'nbr_responsable' => $nbr_responsable,
                    'nbr_employe' => $nbr_employe,
                    'nbr_stagiaire' => $nbr_stagiaire,
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
                break;
            
            case '2':
                return view('dashboard', [
                    'nbr_employe' => $nbr_employe,
                    'nbr_stagiaire' => $nbr_stagiaire,
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
                break;
            case '3':
                return view('dashboard', [
                    'nbr_stagiaire' => $nbr_stagiaire,
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
                break;
            default:
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
                break;
        }
        
        
    }
}
