<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Utilisateur;
use Validator;
use Session;
use DB;
use Illuminate\Support\Facades\Input;
use Response;



class UtilisateurController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
  public function index(Request $request)
    {
      $user=Utilisateur::paginate(6);
      return view('utilisateur.index',compact('user'));
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
        $user=Utilisateur::paginate(6);
        return view('utilisateur.gestionUser',compact('user'));

       }
    public function create(Request $request)
          {
          Utilisateur::create($request->all());
          Session::flash('message','l\'utilisateur '.$request->name.' a été crée avec succès');
          //$req='add';
          return back();
        }

      public function destroy(Request $request)
                {
           $user= Utilisateur::findOrFail($request->userid);
           $user->delete();
           Session::flash('message','l\'utilisateur '.$user->name.' a été supprimé avec succès');
           return back();

            }

            public function search(Request $request){
              $search=$request->get('search');

             $user=DB::table('utilisateurs')->where('name','like','%'.$search.'%')
              ->orWhere('email', 'LIKE', '%' . $search . '%')
              ->orWhere('telephone', 'LIKE', '%' . $search . '%')
              ->orWhere('adresse', 'LIKE', '%' . $search . '%')
              ->paginate(10);
              if(count($user)>0){
                return view('utilisateur.gestionUser',array('user' => $user));

              }else{
                Session::flash('message',' '.$search.' n\'a pas été trouvé');

                return view('utilisateur.gestionUser',array('user' => $user));

              }

            }

            public function edit($id)
                      {
                   return view('utilisateur.edit');

                  }

}
