@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <small><span class="glyphicon glyphicon-check"></span> <a class="ui grey tag label" style="color:black;" href="{{route('ventes')}}">Ventes</a></small>


    </h1>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{route('ventes')}}">Ventes</a></li>
    </ol>





                     <br><br>
             <div class="col-md-3">


              <!-- /.tab-pane -->
            </div>
            <div class="col-md-6">

              <div class="box box-primary">

                <div class="box-body box-profile">
                  <b>Ajouter une vente</b>
                  <br>
                  <br>

              <div class="box box-">

                <!-- /.box-header -->
                <div class="box-body">
                  <form action="{{ route('addVente') }}" method="post" id="Register">
                  		{{csrf_field()}}
            	      <div class="modal-body bgColorWhite">


                    <div class="form-group">
                      <label>Produit Vendu :</label>
                      <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"  name="produit_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">

                        @foreach ($prod as $value)
                        <option value="{{$value->id}}">{{$value->nom}}</option>
                          @endforeach
                      </select>
                    </div>


                      <div class="form-group has-feedback">
                        <label for="quantitevendu">Quantité Vendu :</label>
                        <input type="text" class="form-control" name="quantitevendu" id="quantitevendu" required placeholder="Entrer la quantité" value="{{old('quantitevendu')}}">
                        <span class="glyphicon glyphicon-menu- form-control-feedback"></span>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('quantitevendu', ':message') }}</span></p>
                      </div>
                      <div class="form-group has-feedback">
                        <label for="prix">Prix Unitaire :</label>
                        <input type="text" class="form-control" name="prix" id="prix" required placeholder="Entrer le prix" value="{{old('prix')}}">
                        <span class="glyphicon glyphicon-menu- form-control-feedback"></span>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('prix', ':message') }}</span></p>
                      </div>
                      <div class="form-group has-feedback">
                        <label for="description">Description :</label>
                        <textarea name="description" id="description" class="form-control" rows="3"  placeholder="Entrer la description" value="{{old('description')}}"></textarea>
                        <span class="glyphicon glyphicon-menu- form-control-feedback"></span>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('description', ':message') }}</span></p>
                      </div>

            	      </div>
            	      <div class="modal-footer bg-primary">
            	        <button type="button" onclick="location.href='{{ url('/ventes') }}'" class="btn btn-danger btn-xs"  data-dismiss="modal" ><span class="glyphicon glyphicon-remove"></span> Fermer</button>

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
