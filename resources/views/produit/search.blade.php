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
    <form  action="/searchPrd" method="get">

   <div style='float:left' class="input-group input-group-sm input-group col-md-3">
               <input name="searchPrd" placeholder="Cherche..." type="text" class="form-control">
                   <span class="input-group-btn">
                     <button type="submit" class="btn btn-info btn-flat"><i class="glyphicon glyphicon-search"></i></button>
                   </span>
             </div></br><br>
    </form>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><span class="glyphicon glyphicon-th-list"></span>  Liste Des Produits</h3>



        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body ">
        @if(Session::has('message'))
             <div class="alert alert-info" >
               <p style="text-align:center">{{ Session::get('message')}}</p>
             </div>
             <button href="{{route('produit')}}" style='float:left' type="button" class="btn btn-danger btn-xs" data-toggle="modal" >

               <a style='color:White' href="{{route('produit')}}">Retour</a></li>
             </button>
          </br>
          </br>
             @endif

        <div class="table table-responsive table table-striped">
    <table class="table table-bordered  table-striped" id="table">
      <tr>
        <th class="text-center" width="100px">
          <!--<a href="#" class="create-modal btn btn-success btn-sm" data-toggle="modal" data-target="#add">
            <i class="glyphicon glyphicon-plus"></i>
          </a>-->
          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#add">
            <i class="glyphicon glyphicon-plus"></i>
          </button>

        </th>
        <th>Identifiant</th>
        <th>Nom</th>
        <th>Photo</th>
        <th>Description</th>
        <th>Quantite </th>
        <th>Etat</th>
        <th>Categorie</th>
        <th>Prix</th>
        <th>Marque</th>
        <th>Fournisseur</th>
        <th>Crée le</th>
        <th>Modifier le</th>

      </tr>
      {{ csrf_field() }}
      <?php  $no=1; ?>
      @foreach ($produit as $value)
        <tr >
          <td class="text-center">

            <!--<a href="#" class=" btn btn-primary btn-xs" data-toggle="modal" data-target="#show" >
              <i class="fa fa-eye"></i>
            </a>-->
            <a href="{{action('ProduitController@edit', $value->id)}}" class=" btn btn-warning btn-xs">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="#" class=" btn btn-danger btn-xs" data-produit_id="{{$value->id}}" data-toggle="modal" data-target="#delete">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
          </td>
          <td>{{ $value->identification }}</td>
          <td>{{ $value->nom }}</td>
          @if (empty($value->photo))
          <td><p class="text-center">vide</p></td>
          @else
          <td><img src='{{ asset('public/images/'.$value->photo) }}' style="width:70px; height:70px; float:left; border-radius:50%; margin-right:25px;"></td>
           @endif
          <td>{{ $value->description }}</td>

          @if ($value->quantite <= 2)
          <td  ><a><span  class="ui red circular label">{{ $value->quantite }}</span></a></td>
          <td style="color:red"><a class="ui red label">Fini</a></td>
          @elseif ($value->quantite > 8)
          <td style='float:center' ><span class="ui green circular label">{{ $value->quantite }}</span></td>
          <td style="color:green"><a class="ui green label">Disponible</a></td>
          @else
          <td style='float:center'><span class="ui yellow  circular label">{{ $value->quantite }}</span></td>
          <td style="color:blue"><a class="ui yellow label">Presque Fini</a></td>
          @endif
          <td>{{ $value->categorie->nom }}</td>
          <td>{{ $value->prix }}.DH</td>
          <td>{{ $value->marque->nom }}</td>
          <td>{{ $value->fournisseur->nom}}</td>
          <td>{{ $value->created_at }}</td>
          <td>{{ $value->updated_at }}</td>

        </tr>
      @endforeach
    </table>
      </div>
      Affichage de {{ $produit->firstItem() }} à {{ $produit->lastItem() }} sur {{ $produit->total() }} entrées (page {{ $produit->currentPage() }} )

      <!-- /.box-body -->
      <div class="box-footer">
      {{$produit->links()}}
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>

<!-- modal add-->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-target="#myModal" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal"  onclick="javascript:window.location.reload()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Ajouter Produit </b></h4>
      </div>
      <form enctype="multipart/form-data" action="{{ route('addProduit') }}" method="post" id="Register">
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
                       <label for="identification">Identifiant :</label>
                       <input type="text" class="form-control" name="identification" id="identification" required placeholder="Entrer identifiant" value="{{old('identification')}}">
                       <span class="glyphicon glyphicon-menu-left form-control-feedback"></span>
                     <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('identification', ':message') }}</span></p>
                     </div>
                      <div class="form-group has-feedback">
          		        	<label for="nom">Nom :</label>
          		        	<input type="text" class="form-control" name="nom" id="nom" required placeholder="Entrer nom" value="{{old('nom')}}">
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
                        <input type="text" class="form-control" name="description" id="description" required placeholder="Entrer description" value="{{old('description')}}">
                        <span class="glyphicon glyphicon-menu-left form-control-feedback"></span>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('description', ':message') }}</span></p>
                      </div>
                      <div class="form-group has-feedback">
                        <label for="quantite">Quantite :</label>
                        <input type="text" class="form-control" name="quantite" id="quantite" required placeholder="Entrer quantite" value="{{old('quantite')}}">
                        <span class="glyphicon glyphicon-menu-left form-control-feedback"></span>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('quantite', ':message') }}</span></p>
                      </div>
                      <div class="form-group has-feedback">
                        <label for="categorie_id">Categorie :</label>
                        <select name="categorie_id" class="ui dropdown">
                            @foreach ($categ as $value)
                            <option value="{{$value->id}}">{{$value->nom}}</option>
                              @endforeach
                          </select>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('categorie_id', ':message') }}</span></p>
                      </div>
                      <div class="form-group has-feedback">
                        <label for="prix">Prix :</label>
                        <input type="text" class="form-control" name="prix" id="prix" required placeholder="Entrer prix" value="{{old('prix')}}">
                        <span class="glyphicon glyphicon-menu-left form-control-feedback"></span>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('prix', ':message') }}</span></p>
                      </div>
                      <div class="form-group has-feedback">
                        <label for="marque_id">Marque :</label>
                        <select name="marque_id" class="ui dropdown ">
                            @foreach ($marque as $value)
                            <option value="{{$value->id}}">{{$value->nom}}</option>
                              @endforeach
                          </select>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('marque_id', ':message') }}</span></p>
                      </div>
                      <div class="">
                        <label for="fournisseur_id">Fournisseur :</label>
                        <select name="fournisseur_id" class="ui dropdown">
                            @foreach ($four as $fours)
                            <option value="{{$fours->id}}">{{$fours->nom}}</option>
                              @endforeach
                          </select>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('fournisseur_id', ':message') }}</span></p>
                      </div>


	      </div>
	      <div class="modal-footer bg-info">
	        <button type="button" class="btn btn-secondary" onclick="javascript:window.location.reload()" data-dismiss="modal" ><span class="glyphicon glyphicon-remove"></span> Fermer</button>

	        <button type="submit"  class="btn btn-primary" ><span class="glyphicon glyphicon-log-in"></span> Enregistrer</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal delete -->
<div class="modal fade"  class="btn btn-info btn-lg" id="delete" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <button type="button" class="close" data-dismiss="modal"  onclick="javascript:window.location.reload()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Confirmer la suppression</h4>
      </div>
      <form action="{{route('destroyProduit')}}" method="post">

           {{ csrf_field() }}
	      <div class="modal-body">
				<p class="text-center">
					Êtes-vous sûr de vouloir supprimer ceci?
				</p>
	      		<input type="hidden" name="produit_id" id="produit_id" value="">

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
$('#edit').on('show.bs.modal', function (event) {

     var button = $(event.relatedTarget)
     var nom = button.data('nom')
     var email = button.data('email')
     var telephone = button.data('telephone')
     var fax = button.data('fax')
     var ville = button.data('ville')
     var adresse1 = button.data('adresse1')
     var adresse2 = button.data('adresse2')
     var modal = $(this)

     modal.find('.modal-body #nom').val(nom);
     modal.find('.modal-body #email').val(email);
     modal.find('.modal-body #telephone').val(telephone);
     modal.find('.modal-body #fax').val(fax);
     modal.find('.modal-body #ville').val(ville);
     modal.find('.modal-body #adresse1').val(adresse1);
     modal.find('.modal-body #adresse2').val(adresse2);
})

$('#delete').on('show.bs.modal', function (event) {

     var button = $(event.relatedTarget)

     var produit_id = button.data('produit_id')
     var modal = $(this)

     modal.find('.modal-body #produit_id').val(produit_id);
})

$('#show').on('show.bs.modal', function (event) {

     var button = $(event.relatedTarget)
     var nom = button.data('nom')
     var email = button.data('email')
     var telephone = button.data('telephone')
     var fax = button.data('fax')
     var ville = button.data('ville')
     var adresse1 = button.data('adresse1')
     var adresse2 = button.data('adresse2')
     var modal = $(this)

     modal.find('.modal-body #nom').val(nom);
     modal.find('.modal-body #email').val(email);
     modal.find('.modal-body #telephone').val(telephone);
     modal.find('.modal-body #fax').val(fax);
     modal.find('.modal-body #ville').val(ville);
     modal.find('.modal-body #adresse1').val(adresse1);
     modal.find('.modal-body #adresse2').val(adresse2);
})

</script>


@if(count($errors) > 0 )
<script type="text/javascript">
        $(window).on('load', function () {
        $('#add').modal('show');
    });

</script>
@endif


@endsection
