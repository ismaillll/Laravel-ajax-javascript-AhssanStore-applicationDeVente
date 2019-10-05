<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\http\Requests\ProduitRequest;
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



class ProduitController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');

  }

  public function index(Request $request)
    {

      $produit=Produit::orderBy('created_at', 'DESC')->paginate(12);
      $four=Fournisseur::all();
      $categ=Categorie::all();
      $marque=Marque::all();
      return view('produit.index')->with(compact('produit','four','marque','categ'));


    }

    public function create(ProduitRequest $request)
          {
            $produit = new Produit;
          $produit->identification = $request->identification;
          $produit->nom = $request->nom;
          $produit->description = $request->description;
          $produit->quantite = $request->quantite;
          $produit->categorie_id = $request->categorie_id;
          $produit->prix = $request->prix;
          $produit->marque_id = $request->marque_id;
          $produit->fournisseur_id = $request->fournisseur_id;




                if($request->hasfile('photo'))
             {
                 $file = $request->file('photo');
                 $extension = $file->getClientOriginalExtension();
                 $filename =time().'.'.$extension;
                 $file->move('public/images', $filename);
                 $produit->photo =$filename;

             }
         $produit->save();


              Session::flash('message','le produit '.$request->nom.' a été crée avec succès');
              return back();
                //$req='add';
              //  return back();
              }





     public function edit($id)
           {


             $produit = \App\Produit::find($id);
            // $id_four=Fournisseur::where();
             $four=Fournisseur::where('id','!=',$produit->fournisseur_id)->get();
             $categ=Categorie::where('id','!=',$produit->categorie_id)->get();
             $marque=Marque::where('id','!=',$produit->marque_id)->get();
             return view('produit.edit')->with(compact('produit','four','marque','categ','id'));



         }
         public function update(Request $request, $id)
        {
            $prod= \App\Produit::find($id);
            $prod->identification=$request->get('identification');
            $prod->nom=$request->get('nom');
            $prod->description=$request->get('description');
            $prod->quantite=$request->get('quantite');
            $prod->categorie_id=$request->get('categorie_id');
            $prod->prix=$request->get('prix');
            $prod->marque_id=$request->get('marque_id');
            $prod->fournisseur_id=$request->get('fournisseur_id');
            if($request->hasfile('photo'))
         {
             $file = $request->file('photo');
             $extension = $file->getClientOriginalExtension();
             $filename =time().'.'.$extension;
             $file->move('public/images', $filename);

             $prod->photo =$filename;

         }
            $prod->save();


            Session::flash('message','le produit '.$request->nom.' a été Modifier avec succès');
          return redirect('/produit');

        }



     public function destroy(Request $request)
             {
               $produit= Produit::findOrFail($request->produit_id);
              $produit->delete();
              Session::flash('message','le produit '.$produit->nom.' a été supprimé avec succès');
              return back();

         }






         public function search(Request $request){
           $search=$request->get('searchPrd');
           $four=Fournisseur::all();
           $categ=Categorie::all();
           $marque=Marque::all();

          $produit=Produit::where('nom','like','%'.$search.'%')
           ->orWhere('identification', 'LIKE', '%' . $search . '%')
           ->orWhere('categorie_id', 'LIKE', '%' . $search . '%')
           ->orWhere('marque_id', 'LIKE', '%' . $search . '%')
           ->orWhere('quantite', 'LIKE', '%' . $search . '%')
           ->orWhere('description', 'LIKE', '%' . $search . '%')
           ->orderBy('created_at', 'DESC')->paginate(10);
           if(count($produit)>0){
             return view('produit.index')->with(compact('produit','four','marque','categ'));

           }else{
             Session::flash('message',' '.$search.' n\'a pas été trouvé');

             return view('produit.index')->with(compact('produit','four','marque','categ'));

           }

         }
}
