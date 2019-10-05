@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>

      <small><span class="glyphicon glyphicon-list-alt"></span> <a class="ui grey tag label" style="color:black;" href="{{route('fournisseur')}}"> Gestion de Fournisseurs</a></small>
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

        <div  class="col-md-6">

             <form method="post" action="{{action('FournisseurController@update', $id)}}">
             @csrf
             <input name="_method" type="hidden" value="PATCH">



             <div class="form-group has-feedback">
               <label for="nom">Nom :</label>
               <input type="text" class="form-control" name="nom" id="nom"  value="{{$fours->nom}}">
               <span class="glyphicon glyphicon-user form-control-feedback"></span>
             <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('nom', ':message') }}</span></p>
             </div>

             <div class="form-group has-feedback">
               <label for="email">Email :</label>
               <input type="email" class="form-control" name="email" id="email" value="{{$fours->email}}">
               <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
               <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('email', ':message') }}</span></p>
             </div>
             <div class="form-group has-feedback">
               <label for="telephone">Téléphone :</label>
               <input type="phoneNumber" class="form-control" name="telephone" id="telephone"  value="{{$fours->telephone}}">
               <span class="glyphicon glyphicon-phone form-control-feedback"></span>
               <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('telephone', ':message') }}</span></p>
             </div>
             <div class="form-group has-feedback">
               <label for="fax">Fax :</label>
               <input type="phoneNumber" class="form-control" name="fax" id="fax"  value="{{$fours->fax}}">
               <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
               <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('fax', ':message') }}</span></p>
             </div>
             <div class="form-group has-feedback">
               <label for="ville">Ville :</label>
               <input type="text" class="form-control" name="ville" id="ville" value="{{$fours->ville}}">
               <span class="glyphicon glyphicon-globe form-control-feedback"></span>
               <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('ville', ':message') }}</span></p>
             </div>
             <div class="form-group has-feedback">
               <label for="adresse1">Adresse :</label>
               <input type="textarea" class="form-control" name="adresse1" id="adresse1"  value="{{$fours->adresse1}}">
               <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
               <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('adresse1', ':message') }}</span></p>
             </div>
             <div class="form-group has-feedback">
               <label for="adresse2">Adresse 2 :</label>
               <input type="textarea" class="form-control" name="adresse2" id="adresse2"  value="{{$fours->adresse2}}" >
               <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
               <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('adresse2', ':message') }}</span></p>
             </div>

             <div class="row">
               <div class="col-md-4"></div>
               <div class="form-group col-md-4" style="margin-top:60px">
                 <button type="submit" class="btn btn-success" style="margin-left:38px">Modifier</button>
               </div>
             </div>

           </form>
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
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
@endsection
