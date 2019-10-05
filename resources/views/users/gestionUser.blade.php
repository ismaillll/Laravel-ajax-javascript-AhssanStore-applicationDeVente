@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>

      <small><span class="glyphicon glyphicon-list-alt"></span> <a class="ui grey tag label" style="color:black;" href="{{route('gstuser')}}"> Gérer l'utilisateurs</a></small>

    </h1>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{route('gstuser')}}">gérer les utilisateurs</a></li>
    </ol>

  <section class="content">

    <!-- Default box -->
    <div class="box box-">
      <div class="box-header with-border">
        <h3 class="box-title"><span class="glyphicon glyphicon-list"></span>  Liste Utilisateurs  </h3>


        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>

      <div class="box-body">
        <div class="clm-md-12">

        @if(Auth::user()->role=='admin')

        <button style='float:right' type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ajouter">
          <i class="glyphicon glyphicon-plus"> </i> Ajouter Utilisateur
        </button>
        <form  action="/searchUser" method="get">
         <br>
           <div style='float:left' class="input-group input-group-sm input-group col-md-3">
                <input name="search" placeholder="Cherche..." type="text" class="form-control">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
              </div></br>
        </form>

      </div><br>
      @if(Session::has('message'))
           <div class="alert alert-info" >
             <p style="text-align:center">{{ Session::get('message')}}</p>
           </div>

           <button  style='float:left' type="button" class="btn btn-danger btn-xs" data-toggle="modal" >

             <a style='color:White' href="{{route('gstuser')}}">Retour</a></li>
           </button>
        </br>
        </br>
           @endif


               <div class="table table-responsive table table-striped">
    <table class="table table-bordered  table-striped" id="table">
      <tr>
        <th class="text-center" width="100px"><button  type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ajouter">
          <i class="glyphicon glyphicon-plus"> </i>
        </button></th>
        <th>Nom</th>
        <th>Email</th>
        <th>Téléphone</th>

        <th>Adresse </th>
        <th>Photo</th>
        <th>role</th>
        <th>Vente</th>
        <th>Crée le</th>
        <th>Modifier le</th>

      </tr>
      {{ csrf_field() }}

      @foreach ($user as $value)
        <tr width="100px" >

          <td  class="text-center">


            <a href="{{action('UserController@edit', $value->id)}}" class=" btn btn-warning btn-xs">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="" class=" btn btn-danger btn-xs" data-user_id="{{$value->id}}" data-toggle="modal" data-target="#delete">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
            <!--  {!! Form::open(['method'=>'DELETE', 'route'=>['users.destroy',$value->id]]) !!}


                      <button data-toggle="tooltip" data-placement="top" title="Delete" type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');"><span class="glyphicon glyphicon-remove"></span></button>
                  {!! Form::close() !!}-->
          </td>
          <td>{{ $value->name }}</td>
          <td>{{ $value->email }}</td>
          <td class="ui   label">{{ $value->telephone }}</td>
          <td>{{ $value->adresse }}</td>
          @if (empty($value->photo))
          <td><p class="text-center">vide</p></td>
          @else
         <td><img src='{{ asset('public/images/'.$value->photo) }}' style="width:70px; height:70px; float:left; border-radius:50%; margin-right:25px;"></td>
          @endif
          <td class="ui pointing red label">{{ $value->role }}</td>
            <td><div class="ui compact menu"> <a href="/venteForUser/{{$value->id}}" class="item"> <i class="fa fa-money"> </i><span>-</span>  Voir<div class="floating ui teal label">{{$value->ventes->count()}}</div></a></div></td>

         <td>{{ $value->created_at  }}</td>
         <td>{{ $value->updated_at   }}</td>

        </tr>
      @endforeach
    </table>
      </div>
      <br>
      <h6>Affichage de {{ $user->firstItem() }} à {{ $user->lastItem() }} sur {{ $user->total() }} entrées (page {{ $user->currentPage() }} )</h6>

      <div class="box-footer">
            {{$user->links()}}
            </div>


    </div>
    @else
    <div class="alert alert-danger" >
      <p style="text-align:center">Vous n'avez pas le droit de voir ceci seuls les administrateurs sont censés de ce privilège</p>
    </div>
 @endif
</div>
</section>
</div>
<!-- modal add-->
<div class="modal fade" id="ajouter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-target="#myModal" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal"  onclick="javascript:window.location.reload()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Ajouter Utilisateur </b></h4>
      </div>
      <form enctype="multipart/form-data" action="{{ route('addUser') }}" method="post" id="Register">
      		{{csrf_field()}}
	      <div class="modal-body bgColorWhite">
        <!--  @if(count($errors))
          <div class="alert alert-danger" role="alert">
            <ul>
          @foreach ($errors->all() as $message)
              <li> {{$message}}</li>
              @endforeach
            </ul>
          </div>
          @endif-->
          <div class="form-group has-feedback ">
            <label for="name">Nom :</label>
            <input type="text" class="form-control" name="name" id="name" required placeholder="Entrer nom" value="{{old('name')}}">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('name', ':message') }}</span></p>
          </div>
          <div class="form-group has-feedback ">
            <label for="telephone">Téléphone :</label>
            <input type="phoneNumber" class="form-control" name="telephone" id="telephone" required placeholder="Entrer numéro téléphone" value="{{old('telephone')}}">
            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('telephone', ':message') }}</span></p>
          </div>
          <div class="form-group has-feedback ">
            <label for="email">Email :</label>
            <input type="email" class="form-control" name="email" id="email" required placeholder="doit étre un compte gmail réel , mais le password c'est de  votre choix !" value="{{old('email')}}">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('email', ':message') }}</span></p>
          </div>
          <div class="form-group has-feedback ">
            <label for="someSwitchOptionPrimary">Password :</label>
            <input type="password" class="form-control" placeholder="password"  name="password" id="password"  value="{{old('password')}}">
            <!--<img src="{{ URL::to('/') }}/dist/img/eye.png}}" onmouseover="mouseoverPass();" onmouseout="mouseoutPass();" />-->
            <span class="glyphicon glyphicon-eye-open form-control-feedback"></span>
            <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('password', ':message') }}</span></p>
            <input type="checkbox" onclick="myFunction()"> Afficher Password
          </div>
          <div class="form-group has-feedback ">
            <label for="adresse">Adresse :</label>
            <input type="textarea" class="form-control" name="adresse" id="adresse" required placeholder="Entrer adresse" value="{{old('adresse')}}">
            <span class="glyphicon glyphicon-globe form-control-feedback"></span>
            <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('adresse', ':message') }}</span></p>
          </div>
          <div class="form-group has-feedback">
           <span class="btn btn-primary btn-xs lw-btn-file">
                             <i class="fa fa-upload"></i> Ajouuter une Image
           <input class="form-control-file" name="photo" id="photo" type="file" >
           <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('photo', ':message') }}</span></p>
          </span>
          </div>
          <div class="control-group">
            <b>Type : </b>
            <label class="control control--radio"> Admin
              <input type="radio" value="admin" name="role" />
              <div class="control__indicator"></div>
            </label>
            <label class="control control--radio"> User
              <input type="radio" value="user" name="role" checked="checked"/>
              <div class="control__indicator"></div>
             </label>
            <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('role', ':message') }}</span></p>
          </div>


	      </div>
	      <div class="modal-footer bg-info">
	        <button type="button" class="btn btn-danger btn-xs" onclick="javascript:window.location.reload()" data-dismiss="modal" ><span class="glyphicon glyphicon-remove"></span> Fermer</button>

	        <button type="submit"  class="btn btn-info btn-xs" ><span class="glyphicon glyphicon-log-in"></span> Enregistrer</button>
	      </div>
      </form>
    </div>
  </div>
</div>



<div class="modal fade"  class="btn btn-info btn-lg" id="delete" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <button type="button" class="close" data-dismiss="modal"  onclick="javascript:window.location.reload()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Confirmer la suppression</h4>
      </div>
      <form action="{{route('destroyUser')}}" method="post">

           {{ csrf_field() }}
	      <div class="modal-body">
				<p class="text-center">
					Êtes-vous sûr de vouloir supprimer ceci?
				</p>
	      		<input type="hidden" name="user_id" id="user_id" value="">

	      </div>
	      <div class="modal-footer">
	        <button type="button" onclick="javascript:window.location.reload()" class="btn btn-danger btn-xs" data-dismiss="modal">Non</button>
	        <button type="submit" onclick="javascript:window.location.reload()" class="btn btn-info btn-xs">Oui</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<script src="{{asset('js/app.js')}}"></script>

<script>

function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}


$('#delete').on('show.bs.modal', function (event) {

     var button = $(event.relatedTarget)

     var user_id = button.data('user_id')
     var modal = $(this)

     modal.find('.modal-body #user_id').val(user_id);
})

</script>

@if(count($errors) > 0 )
<script type="text/javascript">
        $(window).on('load', function () {
        $('#ajouter').modal('show');
    });

</script>
@endif

@endsection
