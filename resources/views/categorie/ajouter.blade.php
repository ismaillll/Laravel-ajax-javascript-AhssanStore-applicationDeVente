@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <small><span class="glyphicon glyphicon-bookmark"></span> <a class="ui grey tag label" style="color:black;" href="{{route('categories')}}">Catégories</a></small>


    </h1>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{route('categories')}}">Catégories</a></li>
    </ol>





                     <br><br>
             <div class="col-md-3">


              <!-- /.tab-pane -->
            </div>
            <div class="col-md-6">

              <div class="box box-primary">

                <div class="box-body box-profile">
                  <b>Ajouter catégorie</b>
                  <br>
                  <br>

              <div class="box box-">

                <!-- /.box-header -->
                <div class="box-body">
                  <form action="{{ route('addCategorie') }}" method="post" id="Register">
                  		{{csrf_field()}}
            	      <div class="modal-body bgColorWhite">

                        <!--@if(count($errors))
                        <div class="alert alert-danger" role="alert">
                          <ul>
                        @foreach ($errors->all() as $message)
                            <li> {{$message}}</li>
                            @endforeach
                          </ul>
                        </div>
                        @endif-->
                      <div class="form-group has-feedback">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" name="nom" id="nom" required placeholder="Entrer le nom" value="{{old('nom')}}">
                        <span class="glyphicon glyphicon-menu- form-control-feedback"></span>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('nom', ':message') }}</span></p>
                      </div>

                            <!--<div class="form-group">
                      <label>categorie parent:</label>
                      <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"  name="parent_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         <option value="" selected="select">aucun parent</option>
                        @foreach ($categ as $value)
                        <option value="{{$value->id}}">{{$value->nom}}</option>
                          @endforeach
                      </select>
                      <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('parent_id', ':message') }}</span></p>
                    </div>-->


            	      </div>
            	      <div class="modal-footer bg-primary">
            	        <button type="button" onclick="location.href='{{ url('/categories') }}'" class="btn btn-danger btn-xs"  data-dismiss="modal" ><span class="glyphicon glyphicon-remove"></span> Fermer</button>

            	        <button type="submit"  class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-log-in"></span> Enregistrer</button>
            	      </div>
                  </form>
                </div>
                <!-- /.box-body -->
              </div>
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
