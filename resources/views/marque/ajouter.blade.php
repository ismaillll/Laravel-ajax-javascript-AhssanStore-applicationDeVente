@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <small><span class="glyphicon glyphicon-star"></span> <a class="ui grey tag label" style="color:black;" href="{{route('marques')}}">Marques</a></small>


    </h1>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{route('marques')}}">Marques</a></li>
    </ol>



                   <br><br>
             <div class="col-md-3">


              <!-- /.tab-pane -->
            </div>
            <div class="col-md-6">

              <div class="box box-primary">

                <div class="box-body box-profile">
                  <b>   Ajouter une marque</b>
                  <br>

                <form action="{{ route('addMarque') }}" method="post" id="Register" enctype="multipart/form-data">
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
                    <div class="form-group has-feedback">
                      <label for="nom">Nom :</label>
                      <input type="text" class="form-control" name="nom" id="nom" required placeholder="Entrer nom" value="{{old('nom')}}">
                      <span class="glyphicon glyphicon-menu-left form-control-feedback"></span>
                    <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('nom', ':message') }}</span></p>
                    </div>
                    <div class="form-group has-feedback">
                     <span class="btn btn-primary btn-xs lw-btn-file">
                                       <i class="fa fa-upload"></i> Ajouuter une Image
                     <input class="form-control-file" name="logo" id="logo" type="file" >
                     <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('logo', ':message') }}</span></p>
                    </span>
                    </div>
          	      </div>
          	      <div class="modal-footer bg-primary">
          	        <button type="button" onclick="location.href='{{ url('/marques') }}'" class="btn btn-danger btn-xs"  data-dismiss="modal" ><span class="glyphicon glyphicon-remove"></span> Fermer</button>

          	        <button type="submit"  class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-log-in"></span> Enregistrer</button>
          	      </div>
                </form>

                <div class="box-body">

                </div>
                <!-- /.box-body -->

              <!-- /.box -->
            </div>

          </div>
             <!-- /.tab-pane -->
           </div>
           <div class="col-md-3">


            <!-- /.tab-pane -->
          </div>
            <!-- /.tab-content -->

        </div>


@endsection
