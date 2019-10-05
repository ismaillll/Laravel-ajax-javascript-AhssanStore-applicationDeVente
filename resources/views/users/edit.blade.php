@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>

      <small><span class="glyphicon glyphicon-user"></span> <a class="ui grey tag label" style="color:black;" href="{{route('gstuser')}}"> Gérer l'utilisateurs</a></small>

    </h1>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{route('gstuser')}}">gérer les utilisateurs</a></li>
    </ol>

  <section class="content">

    <!-- Default box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><span class="glyphicon glyphicon-list"></span>  Modifier l'utilisateur </h3>


        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>

      <div class="box-body">

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
           <div class="clm-md-3">

         </div>
         <div class="clm-md-6">
           <form method="post" action="{{action('UserController@update', $id)}}"  enctype="multipart/form-data">
             @csrf
             <input name="_method" type="hidden" value="PATCH">
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
                 <input type="text" class="form-control" name="name" id="name" required placeholder="Entrer nom" value="{{$user->name}}">
                 <span class="glyphicon glyphicon-user form-control-feedback"></span>
               <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('name', ':message') }}</span></p>
               </div>
               <div class="form-group has-feedback ">
                 <label for="telephone">Téléphone :</label>
                 <input type="phoneNumber" class="form-control" name="telephone" id="telephone" required placeholder="Entrer numéro téléphone" value="{{$user->telephone}}">
                 <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                 <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('telephone', ':message') }}</span></p>
               </div>

               <div class="form-group has-feedback ">
                 <label for="email">Email :</label>
                 <input type="email" class="form-control" name="email" id="email" required placeholder="doit étre un compte gmail réel , mais le password c'est de  votre choix !" value="{{$user->email}}">
                 <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                 <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('email', ':message') }}</span></p>
               </div>

               <div class="form-group has-feedback ">
                 <label for="adresse">Adresse :</label>
                 <input type="textarea" class="form-control" name="adresse" id="adresse" required placeholder="Entrer adresse" value="{{$user->adresse}}">
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
                   @if($user->role=='admin')
                   <input type="radio" value="admin" name="role" checked="checked" />
                   @else
                   <input type="radio" value="admin" name="role" />
                   @endif
                   <div class="control__indicator"></div>
                 </label>
                 <label class="control control--radio"> User
                   @if($user->role=='user')
                   <input type="radio" value="user" name="role" checked="checked"/>

                   @else
                   <input type="radio" value="user" name="role" />
                   @endif
                   <div class="control__indicator"></div>
                  </label>

               </div>


     	      </div>
     	      <div class="modal-footer bg-info">
     	        <button type="button" class="btn btn-danger btn-xs" onclick="location.href='{{ url('/gstuser') }}'" data-dismiss="modal" ><span class="glyphicon glyphicon-remove"></span> Fermer</button>

     	        <button type="submit"  class="btn btn-info btn-xs" ><span class="glyphicon glyphicon-log-in"></span> Enregistrer</button>
     	      </div>
           </form>
       </div>
       <div class="clm-md-3">

     </div>







    </div>

</div>
</section>
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



</script>




@endsection
