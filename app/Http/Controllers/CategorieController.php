<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\http\Requests\CategorieRequest;
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

class CategorieController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
      {

        $categories=Categorie::orderBy('created_at', 'DESC')->paginate(12);

        return view('categorie.index')->with(compact('categories'));

      }

      public function create(CategorieRequest $request)
            {

              $categorie = new Categorie;
            $categorie->nom = $request->nom;
            $categorie->parent_id=$request->parent_id;

           $categorie->save();


                Session::flash('message','la categorie  '.$request->nom.' a été crée avec succès');
              //  return view('marque.index')->with('marques');
                  return redirect('/categories');
                }



                public function destroy(Request $request)
                        {
                         $categorie= Categorie::findOrFail($request->categorie_id);
                         $categorie->delete();
                         Session::flash('message','la categorie '.$categorie->nom.' a été supprimé avec succès');
                         return back();

                    }



                    public function search(Request $request){
                      $search=$request->get('searchCategorie');
                     

                     $categories=Categorie::where('nom','like','%'.$search.'%')
                      ->orderBy('created_at', 'DESC')->paginate(10);
                      if(count($categories)>0){
                        return view('categorie.index')->with(compact('categories'));

                      }else{
                        Session::flash('message',' '.$search.' n\'a pas été trouvé');

                        return view('categorie.index')->with(compact('categories'));

                      }

                    }




                    public function update(Request $request, $id)
                   {
                       $categorie= \App\Categorie::find($id);

                       $categorie->nom=$request->get('nom');
                       $categorie->parent_id=$request->get('parent_id');



                       $categorie->save();

                       Session::flash('message','la categorie '.$request->nom.' a été Modifier avec succès');
                     return redirect('/categorie');


                   }
                   public function edit($id)
                         {

                           $categorie = \App\Categorie::find($id);
                          $categ=Categorie::where('id','!=',$categorie->id)->get();
                           return view('categorie.edit')->with(compact('categorie','id','categ'));

                       }
                       public function ajouter()
                             {
                              $categ=Categorie::all();
                               return view('categorie.ajouter',compact('categ'));

                           }
}
