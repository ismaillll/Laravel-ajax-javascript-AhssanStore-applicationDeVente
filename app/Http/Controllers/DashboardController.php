<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Produit;
use App\Marque;
use App\Fournisseur;
use App\Categorie;
use App\Vente;
use App\User;
use Validator;
use Hash;
use Session;
use Response;
use DB;
use Illuminate\Support\Facades\Input;
use Image;
use Auth;
use Carbon\Carbon;


class DashboardController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
      {
        $salesSatistics= DB::table('ventes')
                    ->rightJoin('calendar', DB::raw('DATE(ventes.created_at)'), '=', 'calendar.datefield')

                     ->select('calendar.datefield AS DATE', DB::raw('IFNULL(COUNT(ventes.id), 0 ) AS count'),DB::raw('IFNULL(SUM(ventes.prix * ventes.quantitevendu),0) AS total_sales'))
                    // ->select('calendar.datefield AS DATE', DB::raw(' ANY_VALUE(case achats.recurring_payment when achats.recurring_payment = 0 THEN IFNULL(SUM(achats.price),0) ELSE IFNULL(SUM(achats.prix_tranche * achats.nbr_paye),0) END) as total_sales'))

                    ->whereBetween('calendar.datefield',[ Carbon::now()->startOfMonth() , Carbon::now()->lastOfMonth() ] )
                    ->groupBy('DATE')
                    ->get();

          $userdash=User::all();
          $VentesTime=Vente::all();


        return view('dashboard.index')->with(compact('userdash','salesSatistics'));

      }
}
