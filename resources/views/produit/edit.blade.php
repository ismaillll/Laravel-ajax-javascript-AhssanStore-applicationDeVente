@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>

      <small><span class="glyphicon glyphicon-list-alt"></span> <a class="ui grey tag label" style="color:black;" href="{{route('produit')}}"> Gestion des Produits</a></small>

    </h1>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{route('produit')}}">Produits</a></li>
    </ol>
    <br>


  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box box-black">
      <div class="box-header with-border">



        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div  class="col-md-6">



          <div class="modal-header bg-info">
   <h4>Modifier le produit  " {{$produit->nom}} " de réference " {{$produit->identification}} "</h4>
         </div>
         <br/>
       <form method="post" action="{{action('ProduitController@update', $id)}}"  enctype="multipart/form-data">
         @csrf
         <input name="_method" type="hidden" value="PATCH">

        <div class="form-group has-feedback">
          <label for="identification">Identifiant :</label>
          <input type="text" class="form-control" name="identification" id="identification" required placeholder="Entrer identifiant" value="{{$produit->identification}}">
          <span class="glyphicon glyphicon-menu-left form-control-feedback"></span>
        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('identification', ':message') }}</span></p>
        </div>
         <div class="form-group has-feedback">
           <label for="nom">Nom :</label>
           <input type="text" class="form-control" name="nom" id="nom" required placeholder="Entrer nom" value="{{$produit->nom}}">
           <span class="glyphicon glyphicon-menu-left form-control-feedback"></span>
         <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('nom', ':message') }}</span></p>
         </div>

         <div class="form-group has-feedback">
          <span class="btn btn-primary btn-xs lw-btn-file">
          <i class="fa fa-upload"></i> Ajouuter une Image
          <input class="form-control-file" name="photo" id="photo" type="file" >
          <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('photo', ':message') }}</span></p>
         </span>
         </div>

         <div class="form-group has-feedback">
           <label for="description">Description :</label>
           <input type="text" class="form-control" name="description" id="description" required placeholder="Entrer description" value="{{$produit->description}}">
           <span class="glyphicon glyphicon-menu-left form-control-feedback"></span>
           <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('description', ':message') }}</span></p>
         </div>
         <div class="form-group has-feedback">
           <label for="quantite">Quantite :</label>
           <input type="text" class="form-control" name="quantite" id="quantite" required placeholder="Entrer quantite" value="{{$produit->quantite}}">
           <span class="glyphicon glyphicon-menu-left form-control-feedback"></span>
           <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('quantite', ':message') }}</span></p>
         </div>
         <div class="form-group has-feedback">
           <label for="categorie_id">Catégorie :</label>
           <select name="categorie_id" class="ui dropdown">
             @if(!empty($produit->categorie->id))
             <option value="{{$produit->categorie->id}}">{{$produit->categorie->nom}}</option>
               @foreach ($categ as $value)
               <option value="{{$value->id}}">{{$value->nom}}</option>
                 @endforeach

            @else
            <option value="">pas de catégorie</option>
              @foreach ($categ as $value)
              <option value="{{$value->id}}">{{$value->nom}}</option>
                @endforeach
            @endif
             </select>
         </div>
         <div class="form-group has-feedback">
           <label for="prix">Prix :</label>
           <input type="text" class="form-control" name="prix" id="prix" required placeholder="Entrer prix" value="{{$produit->prix}}">
           <span class="glyphicon glyphicon-menu-left form-control-feedback"></span>
           <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('prix', ':message') }}</span></p>
         </div>
         <div class="form-group has-feedback">
           <label for="marque_id">Marque :</label>
           <select name="marque_id" class="ui dropdown">
             <option value="{{$produit->marque->id}}">{{$produit->marque->nom}}</option>
               @foreach ($marque as $value)
               <option value="{{$value->id}}">{{$value->nom}}</option>
                 @endforeach
             </select>
           <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('marque_id', ':message') }}</span></p>
         </div>
         <div class="">
           <label for="fournisseur_id">Fournisseur :</label>
           <select name="fournisseur_id" class="ui dropdown">
             <option value="{{$produit->fournisseur->id}}">{{$produit->fournisseur->nom}}</option>
               @foreach ($four as $fours)
               <option value="{{$fours->id}}">{{$fours->nom}}</option>
                 @endforeach
             </select>
           <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('fournisseur_id', ':message') }}</span></p>
         </div>

    <div class="modal-footer bg-info">
      <button href="{{route('gstuser')}}" style='float:left' type="button" class="btn btn-danger btn-xs" data-toggle="modal" >
        <a style='color:White' href="{{route('produit')}}">Retour</a></li>
      </button>

    <button type="submit"  class=" btn btn-primary btn-xs" ><span class="glyphicon glyphicon-log-in"></span> Enregistrer</button>
    </div>
  </form>
</div>
</div>
      <!-- /.box-body -->
      <div class="box-footer">

      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>

@endsection
