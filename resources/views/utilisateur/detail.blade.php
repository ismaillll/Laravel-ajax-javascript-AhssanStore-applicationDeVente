@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <span class="glyphicon glyphicon-list-alt"></span>  Gestion de Fournisseurs
      <small></small>
    </h1>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{route('fournisseur')}}">Fournisseur</a></li>

    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box box-">
      <div class="box-header with-border">
        <h3 class="box-title">  </h3>

         @if(Session::has('message'))
              <div class="alert alert-info" >
                <p style="text-align:center">{{ Session::get('message')}}</p>
              </div>
              @endif

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body" >
        <h2>Modifier le fournisseur : {{$fours->nom}}</h2><br  />
        <form action="{{ route('editUser') }}" method="post" id="Register">
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
                          <input type="email" class="form-control" name="email" id="email" required placeholder="Entrer email" value="{{old('email')}}">
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
                          <label for="photo">Image :</label>
                          <input type="file" class="form-control-file" name="photo" id="photo" required  value="{{old('photo')}}">
                          <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('photo', ':message') }}</span></p>
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
      <!-- /.box-body -->
      <div class="box-footer">

      </div>
      <!-- /.box-footer-->

    <!-- /.box -->
    </div>
  </section>
  <!-- /.content -->


</div>
@endsection
