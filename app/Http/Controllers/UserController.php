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
use App\http\Requests\userUpdateRequest;
use App\http\Requests\RequestUser;
use Illuminate\Support\Facades\Input;
use Image;
use Auth;


class UserController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');

  }
  public function index(Request $request)
    {

      $venteCount=Vente::where('user_id','=',Auth::user()->id)->count();
      $user=User::orderBy('created_at', 'DESC')->paginate(6);
      return view('users.index',compact('user','venteCount'),array('userAuth' => Auth::user()));
      //return view('user.index')
    /*  $request->session()->put('search', $request
              ->has('search') ? $request->get('search') : ($request->session()
              ->has('search') ? $request->session()->get('search') : ''));

              $request->session()->put('field', $request
                      ->has('field') ? $request->get('field') : ($request->session()
                      ->has('field') ? $request->session()->get('field') : 'name'));

                      $request->session()->put('sort', $request
                              ->has('sort') ? $request->get('sort') : ($request->session()
                              ->has('sort') ? $request->session()->get('sort') : 'asc'));

      $users = new User();
            $users = $users->where('name', 'like', '%' . $request->session()->get('search') . '%')
                ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
                ->paginate(5);
            if ($request->ajax()) {
              return view('user.index', compact('users'));
            } else {
              return view('user.ajax', compact('users'));
            }
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get'))
        return view('user.form');

        $rules = [
          'name' => 'required',
          'telephone' => 'required',
          'email' => 'required',
          'password' => 'required',
          'adresse' => 'required',
          //'photo'=>'',
          'role' => 'required',
          //'id_vente'=>'',

        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        return response()->json([
          'fail' =>true,
          'errors' => $validator->errors()
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->telephone = $request->telephone;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->adresse = $request->adresse;
        $user->photo = $request->photo;
        $user->role = $request->role;
        $user->save();

        return response()->json([
          'fail' => false,
          'redirect_url' => url('users')
        ]);
    }

    public function show(Request $request, $id)
    {
        if($request->isMethod('get')) {
          return view('user.detail',['user' => User::find($id)]);
        }
    }

    public function update(Request $request, $id)
    {
      if ($request->isMethod('get'))
      return view('user.form',['user' => User::find($id)]);

      $rules = [
        'name' => 'required',
        'telephone' => 'required',
        'email' => 'required',
        'password' => 'required',
        'adresse' => 'required',
        'role' => 'required',
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails())
      return response()->json([
        'fail' =>true,
        'errors' => $validator->errors()
      ]);

      $user = User::find($id);
      $user->name = $request->name;
      $user->telephone = $request->telephone;
      $user->email = $request->email;
      $user->password = $request->password;
      $user->adresse = $request->adresse;
      $user->photo = $request->photo;
      $user->role = $request->role;
      $user->save();

      return response()->json([
        'fail' => false,
        'redirect_url' => url('users')
      ]);
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect('users');
    }*/

    }
    public function indexUserpage(Request $request)
      {
        $user=User::orderBy('created_at', 'DESC')->paginate(6);
        return view('users.gestionUser',compact('user'));

       }

    public function create(RequestUser $request)
          {
            $user = new User;
          $user->name = $request->name;
          $user->email = $request->email;
          $user->telephone = $request->telephone;
          $user->password =Hash::make($request['password']);
          $user->adresse = $request->adresse;
          $user->role = $request->role;
          if($request->hasfile('photo'))
       {
           $file = $request->file('photo');
           $extension = $file->getClientOriginalExtension();
           $filename =time().'.'.$extension;
           $file->move('public/images', $filename);
           $user->photo =$filename;

       }

  		$user->save();

        Session::flash('message','l\'utilisateur '.$request->name.' a été crée avec succès');
        return back();
          //$req='add';
        //  return back();
        }

        public function update(userUpdateRequest $request, $id)
       {
           $user= \App\User::find($id);
           $user->name = $request->name;
           $user->telephone = $request->telephone;
           $user->adresse = $request->adresse;
           $user->role = $request->role;
           if($request->hasfile('photo'))
        {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            $file->move('public/images', $filename);

            $user->photo =$filename;

        }
           $user->save();


           Session::flash('message','l\'utilisateur '.$request->name.' a été Modifier avec succès');
         return redirect('/gstuser');

       }

      /*  public function destroy($id)
      {
          $user = User::findOrFail($id);

          $user->delete(); //DELETE OCCURS HERE AFTER RECORD FOUND

          Session::flash('message','l\'utilisateur '.$user->name.' a été supprimé avec succès');

          return back();
      }*/
     public function destroy(Request $request)
                {
            $user= User::findOrFail($request->user_id);
           $user->delete();
           Session::flash('message','l\'utilisateur '.$user->name.' a été supprimé avec succès');
           return back();

         }

            public function search(Request $request){
              //$search=trim($request->get('search'));
            //  $search=str_replace(' ', '', trim($request->get('search')));
              //$search = str_replace(' ', '', $request->get('search'));
             $venteCount=Vente::where('user_id','=',Auth::user()->id)->count();
              $search=$request->get('search');
             $user=User::where('name','like','%'.$search.'%')
              ->orWhere('email', 'LIKE', '%' . $search . '%')
              ->orWhere('telephone', 'LIKE', '%' . $search . '%')
              ->orWhere('adresse', 'LIKE', '%' . $search . '%')
              ->orderBy('created_at', 'DESC')->paginate(10);
              if(count($user)>0){
                return view('users.gestionUser',array('user' => $user))->with('venteCount');

              }else{
                Session::flash('message',' '.$search.' n\'a pas été trouvé');

                return view('users.gestionUser',array('user' => $user))->with('venteCount');

              }

            }
            public function searchUserIfadmin(Request $request){
              $venteCount=Vente::where('user_id','=',Auth::user()->id)->count();
              $search=$request->get('search');

             $user=User::where('name','like','%'.$search.'%')
              ->orWhere('email', 'LIKE', '%' . $search . '%')
              ->orWhere('telephone', 'LIKE', '%' . $search . '%')
              ->orWhere('adresse', 'LIKE', '%' . $search . '%')
              ->orderBy('created_at', 'DESC')->paginate(10);
              if(count($user)>0){
                return view('users.index',array('user' => $user))->with('venteCount');

              }else{
                Session::flash('message',' '.$search.' n\'a pas été trouvé');

                return view('users.index',array('user' => $user))->with('venteCount');

              }

            }

            public function edit($id)
                  {

                    $user = \App\User::find($id);

                return  view('users.edit')->with(compact('user','id'));

                }

}
