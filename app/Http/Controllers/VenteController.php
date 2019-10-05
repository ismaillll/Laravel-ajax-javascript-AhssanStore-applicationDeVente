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

class VenteController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');

  }
  public function index(Request $request)
    {

      if(Auth::user()->role=='admin'){
        $ventes=Vente::orderBy('created_at', 'DESC')->paginate(30);
        return view('vente.index')->with(compact('ventes'));
      }
      else{
        $ventes=Vente::where('user_id','=',Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(30);
        return view('vente.index')->with(compact('ventes'));
      }

    }

    public function destroy(Request $request)
            {
              $vente=Vente::findOrFail($request->vente_id);
             $vente->delete();
             Session::flash('message','la vente pour le produit '.$vente->produit->nom.' a été supprimé avec succès');
             return back();

        }

        public function search(Request $request){
          $search=$request->get('searchVente');

             $user=DB::table('users')->where('name','=',$search)->get()->first();
            // $prod=Produit::where('nom','=',$search)->pluck('id');


         $ventes=Vente::where('quantitevendu','like','%'.$search.'%')
          ->orWhere('prix', 'LIKE', '%' . $search . '%')
          ->orWhere('produit_id', 'LIKE', '%' . $search . '%')


          ->orWhere('created_at', 'LIKE', '%' . $search . '%')
          ->orWhere('description', 'LIKE', '%' . $search . '%')
          ->orderBy('created_at', 'DESC')
          ->paginate(10);
          if(count($ventes)>0){
            Session::flash('message',' '.$search.'');
            return view('vente.index')->with(compact('ventes'));

          }else{
            Session::flash('message',' '.$search.' n\'a pas été trouvé');

            return view('vente.index')->with(compact('ventes'));

          }

        }


        public function create(Request $request)
              {

                $vente = new Vente;
              $vente->produit_id = $request->produit_id;
              $vente->user_id =Auth::user()->id;
              $vente->quantitevendu = $request->quantitevendu;
              $vente->prix = $request->prix;
              $vente->description = $request->description;
              //DB::table('produits')->increment('posts', 5);
              //Produit::where("id", $request->produit_id)->decrement('quantite', $request->quantitevendu);
              $produit=Produit::findOrFail($request->produit_id);
            // $produit=Produit::where('id','=','$request->produit_id')->get();
              // dd($produit);
             $remain =((int)$produit->quantite - (int)$request->quantitevendu);
             $produit->quantite=$remain;
             if($remain <0){
               Session::flash('qte','la quantité sélectionnée est plus grande que la quantité de produit déjà existe, veuillez sélectionner une quantité inférieure ou égale à la quantité disponible.');

             //  return view('marque.index')->with('marques');
                 return redirect('/ventes');
             }
             else{
               $produit->save();

               $vente->save();
               Session::flash('message','la vente a été crée avec succès');
             //  return view('marque.index')->with('marques');
                 return redirect('/ventes');
             }





                  }

                  public function ajouter()
                        {
                          $prod=Produit::all();

                          return view('vente.addVente')->with(compact('prod'));

                      }

                public function venteForUser($id){

                 $foruser =Vente::where('user_id','=',$id)->orderBy('created_at', 'DESC')->paginate(30);
                 return view('vente.foruser')->with(compact('foruser'));
                }

   }
