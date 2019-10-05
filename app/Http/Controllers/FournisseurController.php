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
use Response;
use Session;
use DB;
use Illuminate\Support\Facades\Input;
use App\http\Requests\FournisseurRequest;
use App\http\Requests\UpdateFournisseur;

class FournisseurController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){

      $four=Fournisseur::orderBy('created_at', 'DESC')->paginate(12);
      return view('fournisseur.index',compact('four'));
    }



   public function create(FournisseurRequest $request)
         {
         Fournisseur::create($request->all());
         Session::flash('message','le Fournisseur '.$request->nom.' a été crée avec succès');
         //$req='add';
         return back();
          // return back()->with("request",$req);
        /* $validator = Validator::make($request->all(), [
           'nom' => 'required|min:2|max:25',
           'email' => 'required|unique:fournisseurs|email',
           'telephone' => 'required|unique:fournisseurs|numeric',
           'fax' => 'unique:fournisseurs|max:25|numeric',
           'ville' => 'required|string|min:3|max:10',
           'adresse1' => 'required|string|min:2|max:100',
           'adresse2' => 'max:100',
         ]);

         $input = $request->all();

         if ($validator->passes()) {

             // Store your user in database

             return Response::json(['success' => '1']);

         }

         return Response::json(['errors' => $validator->errors()]);*/
      /*  $validator = \Validator::make($request->all(), [
          'nom' => 'required|min:2|max:25',
          'email' => 'required|unique:fournisseurs|email',
          'telephone' => 'required|unique:fournisseurs|numeric',
          'fax' => 'unique:fournisseurs|max:25|numeric',
          'ville' => 'required|string|min:3|max:10',
          'adresse1' => 'required|string|min:2|max:100',
          'adresse2' => 'max:100'
       ]);

       if ($validator->fails())
       {
        // return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
           return response()->json(['errors'=>$validator->errors()->all()]);
       }else{
         Fournisseur::create($request->all());
       Session::flash('message','le Fournisseur '.$request->nom.' a été crée avec succès');
           return back();
       }
      // Fournisseur::create($request->all());
      //  Session::flash('message','le Fournisseur '.$request->nom.' a été crée avec succès');
      //  return back();

      /*    $validator = Validator::make($request->all());
          $input = $request->all();

      if ($validator->passes()) {

          // Store your user in database

          return Response::json(['success' => '1']);

      }

      return Response::json(['errors' => $validator->errors()]);*/
      /*  $rules = array(
         'nom' => 'required|alpha|min:8',
         'email' => 'required|email|unique:users,email,' . Input::get('id') . ',id',
         'telephone' => 'required|regex:/^\d{3}\-\d{3}\-\d{4}$/',
         'fax' => 'regex:/^\d{3}\-\d{3}\-\d{4}$/',
         'ville' => 'required|alpha|min:2',
         'adresse1' => 'required|regex:/^[a-z0-9- ]+$/i|min:2',
         'adresse2' => 'regex:/^[a-z0-9- ]+$/i|min:2'

       );

  //  'password'              => 'alpha_num|between:6,12|confirmed',
    //'password_confirmation' => 'alpha_num|between:6,12',
    //'state'                 => 'alpha|min:2|max:2',
    //'zip'                   => 'numeric|min:5|max:5',
       $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  else {
    $four = new Fournisseur;
    $four->nom = $request->nom;
    $four->email = $request->email;
    $four->telephone = $request->telephone;
    $four->fax = $request->fax;
    $four->ville = $request->ville;
    $four->adresse1 = $request->adresse1;
    $four->adresse2 = $request->adresse2;
    $four->save();
    //return response()->json($four);*/

          }



    public function edit($id)
          {

            $fours = \App\Fournisseur::find($id);
          return view('fournisseur.edit',compact('fours','id'));
    //  $four = Fournisseur::findOrFail($request->fourid);

    //  $four->update($request->all());
    //  Session::flash('message','le Fournisseur '.$request->nom.' a été Modifier avec succès');
    //  $req='update';
      //  return back();

    //  return back()->with("request",$req);
    //  return view('fournisseur.index')->with("request",$req);
        }
        public function update(Request $request, $id)
       {
           $four= \App\Fournisseur::find($id);
           $four->nom=$request->get('nom');
           $four->email=$request->get('email');
           $four->telephone=$request->get('telephone');
           $four->fax=$request->get('fax');
           $four->ville=$request->get('ville');
           $four->adresse1=$request->get('adresse1');
           $four->adresse2=$request->get('adresse2');
           $four->save();
           Session::flash('message','le Fournisseur '.$request->nom.' a été Modifier avec succès');
         return redirect('/fournisseur');

       }


    public function destroy(Request $request)
            {
       $four= Fournisseur::findOrFail($request->fourid);
       $four->delete();
       Session::flash('message','le Fournisseur '.$four->nom.' a été supprimé avec succès');
       return back();

        }



    function action(Request $request)
           {
    if($request->ajax())
    {
     $output = '';
     $query = $request->get('query');
     if($query != '')
     {
      $data = DB::table('fournisseurs')
        ->where('nom', 'like', '%'.$query.'%')
        ->orWhere('email', 'like', '%'.$query.'%')
        ->orWhere('telephone', 'like', '%'.$query.'%')
        ->orWhere('fax', 'like', '%'.$query.'%')
        ->orWhere('ville', 'like', '%'.$query.'%')
        ->orWhere('adresse1', 'like', '%'.$query.'%')
        ->orWhere('adresse2', 'like', '%'.$query.'%')
        ->orderBy('id', 'desc')
        ->get();

     }
     else
     {
      $data = DB::table('fournisseurs')
        ->orderBy('id', 'desc')
        ->get();
     }
     $total_row = $data->count();
     if($total_row > 0)
     {
      foreach($data as $row)
      {
       $output .= '
       <tr>
        <td>'.$row->nom.'</td>
        <td>'.$row->email.'</td>
        <td>'.$row->telephone.'</td>
        <td>'.$row->fax.'</td>
        <td>'.$row->ville.'</td>
        <td>'.$row->adresse1.'</td>
        <td>'.$row->adresse2.'</td>
        <td>


        </td>
       </tr>
       ';
      }
     }
     else
     {
      $output = '
      <tr>
       <td align="center" colspan="5">No Data Found</td>
      </tr>
      ';
     }
     $data = array(
      'table_data'  => $output,
      'total_data'  => $total_row
     );

     echo json_encode($data);
    }
   }


   public function search(Request $request){
     $search=$request->get('search');

    $four=Fournisseur::where('nom','like','%'.$search.'%')
     ->orWhere('email', 'LIKE', '%' . $search . '%')
     ->orWhere('telephone', 'LIKE', '%' . $search . '%')
     ->orWhere('fax', 'LIKE', '%' . $search . '%')
     ->orWhere('ville', 'LIKE', '%' . $search . '%')
     ->orWhere('adresse1', 'LIKE', '%' . $search . '%')
     ->orWhere('adresse2', 'LIKE', '%' . $search . '%')
     ->orderBy('created_at', 'DESC')->paginate(10);
     if(count($four)>0){
       return view('fournisseur.index',array('four' => $four));

     }else{
       Session::flash('message',' '.$search.' n\'a pas été trouvé');

       return view('fournisseur.index',array('four' => $four));

     }

   }
}
