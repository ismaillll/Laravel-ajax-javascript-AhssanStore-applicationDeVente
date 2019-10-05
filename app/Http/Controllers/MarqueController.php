<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\http\Requests\MarqueRequest;
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

class MarqueController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');

  }
  public function index(Request $request)
    {

      $marques=Marque::orderBy('created_at', 'DESC')->paginate(12);

      return view('marque.index')->with(compact('marques'));

    }

    public function create(MarqueRequest $request)
          {

            $marque = new Marque;
          $marque->nom = $request->nom;
                if($request->hasfile('logo'))
             {
                 $file = $request->file('logo');
                 $extension = $file->getClientOriginalExtension();
                 $filename =time().'.'.$extension;
                 $file->move('public/images', $filename);
                 $marque->logo =$filename;

             }
         $marque->save();


              Session::flash('message','la marque  '.$request->nom.' a été crée avec succès');
            //  return view('marque.index')->with('marques');
                return redirect('/marques');
              }



              public function destroy(Request $request)
                      {
                        $marque= Marque::findOrFail($request->marque_id);
                       $marque->delete();
                       Session::flash('message','la marque '.$marque->nom.' a été supprimé avec succès');
                       return back();

                  }



                  public function search(Request $request){
                    $search=$request->get('searchMarque');
                   

                   $marques=Marque::where('nom','like','%'.$search.'%')
                    ->orderBy('created_at', 'DESC')->paginate(10);
                    if(count($marques)>0){
                      return view('marque.index')->with(compact('marques'));

                    }else{
                      Session::flash('message',' '.$search.' n\'a pas été trouvé');

                      return view('marque.index')->with(compact('marques'));

                    }

                  }




                  public function update(Request $request, $id)
                 {
                     $marque= \App\Marque::find($id);

                     $marque->nom=$request->get('nom');

                     if($request->hasfile('logo'))
                  {
                      $file = $request->file('logo');
                      $extension = $file->getClientOriginalExtension();
                      $filename =time().'.'.$extension;
                      $file->move('public/images', $filename);
                      $marque->logo =$filename;

                  }
                     $marque->save();

                     Session::flash('message','la marque '.$request->nom.' a été Modifier avec succès');
                   return redirect('/marques');

                 }
                 public function edit($id)
                       {

                         $marque = \App\Marque::find($id);

                         return view('marque.edit')->with(compact('marque','id'));

                     }
                     public function ajouter()
                           {

                             return view('marque.ajouter');

                         }
}
