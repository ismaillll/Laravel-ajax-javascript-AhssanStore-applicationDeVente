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

  <section class="content">

    <!-- Default box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">  </h3>



        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">


             <div class="col-md-3">


              <!-- /.tab-pane -->
            </div>
            <div class="col-md-6">

              <div class="box box-">

                <div class="box-body box-profile">
            <b>   Modifie la categorie : {{$categorie->nom}}</b>
            <br>
            <br>
              <div class="box box-">

                <form action="{{action('CategorieController@update',$id)}}" method="post" id="Register" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                  <div class="modal-body bgColorWhite">

                    <div class="form-group has-feedback">
                      <label for="nom">Nom :</label>
                      <input type="text" class="form-control" name="nom" id="nom" required placeholder="Entrer nom" value="{{$categorie->nom}}">
                      <span class="glyphicon glyphicon-menu-left form-control-feedback"></span>
                    <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('nom', ':message') }}</span></p>
                    </div>



                      <!--<div class="form-group">
                      <label>Categorie Parent :</label>
                      <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"  name="produit_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @if(!empty($categorie->parent_id))
                        <option value="{{$categorie->categorie->id}}" selected="select">{{$categorie->categorie->nom}}</option>

                     <option value="">aucun parent</option>
                        @foreach ($categ as $value)
                        <option value="{{$value->id}}">{{$value->nom}}</option>
                          @endforeach
                      @else

                      @foreach ($categ as $value)
                      <option value="{{$value->id}}">{{$value->nom}}</option>
                        @endforeach
                     <option value="" selected="select">aucun parent</option>
                      @endif
                      </select>
                    </div>-->

                  </div>
                  <div class="modal-footer bg-primary">
                    <button type="button" onclick="location.href='{{ url('/categories') }}'" class="btn btn-danger btn-xs"  data-dismiss="modal" ><span class="glyphicon glyphicon-remove"></span> Fermer</button>

                    <button type="submit"  class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-log-in"></span> Enregistrer</button>
                  </div>
                </form>
                <div class="box-body">

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
          <!-- /.nav-tabs-custom -->
        </div>
        </div>


@endsection
