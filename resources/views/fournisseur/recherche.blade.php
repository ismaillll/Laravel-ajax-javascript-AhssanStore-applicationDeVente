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

    </ol></br>

     <form  action="/search" method="get">

    <div align="right" class="input-group input-group-sm input-group col-md-3">
                <input name="search" placeholder="Cherche..." type="text" class="form-control">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
              </div>
     </form>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><span class="glyphicon glyphicon-th-list"></span>  Liste Fournisseurs</h3>

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
      <div class="box-body">
        {{$four->links()}}
        <div class="table table-responsive">
    <table class="table table-bordered" id="table">
      <tr>
        <th width="150px">No</th>
        <th class="sorting_asc" tabindex="0" aria-controls="manageBrandList" rowspan="1" colspan="1" style="width: 90px;" aria-sort="ascending" aria-label="prénom: activate to sort column descending">Nom</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Fax</th>
        <th>Ville</th>
        <th>Adresse </th>
        <th>Adresse 2</th>
        <th>Crée le</th>
        <th class="text-center" width="150px">
          <!--<a href="#" class="create-modal btn btn-success btn-sm" data-toggle="modal" data-target="#add">
            <i class="glyphicon glyphicon-plus"></i>
          </a>-->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
            <i class="glyphicon glyphicon-plus"></i>
          </button>

        </th>
      </tr>
      {{ csrf_field() }}
      <?php  $no=1; ?>
      @foreach ($four as $value)
        <tr >
          <td>{{ $no++ }}</td>
          <td>{{ $value->nom }}</td>
          <td>{{ $value->email }}</td>
          <td>{{ $value->telephone }}</td>
          @if (empty($value->fax))
          <td><p class="text-center">_ _</p></td>
          @else
          <td>{{ $value->fax }}</td>
           @endif
          <td>{{ $value->ville }}</td>
          <td>{{ $value->adresse1 }}</td>
          @if (empty($value->adresse2))
          <td><p class="text-center">_ _</p></td>
          @else
          <td>{{ $value->adresse2 }}</td>
           @endif
          <td>{{ $value->created_at }}</td>
          <td>

            <a href="#" class=" btn btn-info btn-sm" data-toggle="modal" data-target="#show" data-nom="{{$value->nom}}" data-email="{{$value->email}}" data-telephone="{{$value->telephone}}" data-fax="{{$value->fax}}" data-ville="{{$value->ville}}" data-adresse1="{{$value->adresse1}}"  data-adresse2="{{$value->adresse2}}">
              <i class="fa fa-eye"></i>
            </a>
            <a href="{{action('FournisseurController@edit', $value['id'])}}" class=" btn btn-warning btn-sm">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="#" class=" btn btn-danger btn-sm" data-fourid="{{$value->id}}" data-toggle="modal" data-target="#delete">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
          </td>
        </tr>
      @endforeach
    </table>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
      {{$four->links()}}
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
        <h4 class="modal-title" id="myModalLabel"><b>Ajouter Fournisseur </b></h4>
      </div>
      <form action="{{ route('addFournisseur') }}" method="post" id="Register">
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
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                      <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('nom', ':message') }}</span></p>
          	        	</div>

                      <div class="form-group has-feedback">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control" name="email" id="email" required placeholder="Entrer email" value="{{old('email')}}">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('email', ':message') }}</span></p>
                      </div>
                      <div class="form-group has-feedback">
                        <label for="telephone">Téléphone :</label>
                        <input type="phoneNumber" class="form-control" name="telephone" id="telephone" required placeholder="Entrer numéro téléphone" value="{{old('telephone')}}">
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('telephone', ':message') }}</span></p>
                      </div>
                      <div class="form-group has-feedback">
                        <label for="fax">Fax :</label>
                        <input type="phoneNumber" class="form-control" name="fax" id="fax" placeholder="Entrer Fax : optionnel" value="{{old('fax')}}">
                        <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('fax', ':message') }}</span></p>
                      </div>
                      <div class="form-group has-feedback">
                        <label for="ville">Ville :</label>
                        <input type="text" class="form-control" name="ville" id="ville" required placeholder="Entrer ville" value="{{old('ville')}}">
                        <span class="glyphicon glyphicon-globe form-control-feedback"></span>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('ville', ':message') }}</span></p>
                      </div>
                      <div class="form-group has-feedback">
                        <label for="adresse1">Adresse :</label>
                        <input type="textarea" class="form-control" name="adresse1" id="adresse1" required placeholder="Entrer adresse" value="{{old('adresse1')}}">
                        <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('adresse1', ':message') }}</span></p>
                      </div>
                      <div class="form-group has-feedback">
                        <label for="adresse2">Adresse 2 :</label>
                        <input type="textarea" class="form-control" name="adresse2" id="adresse2" placeholder="Entrer 2éme adresse : optionnel " value="{{old('adresse2')}}" >
                        <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('adresse2', ':message') }}</span></p>
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
      <form action="{{route('destroy')}}" method="post">

           {{ csrf_field() }}
	      <div class="modal-body">
				<p class="text-center">
					Êtes-vous sûr de vouloir supprimer ceci?
				</p>
	      		<input type="hidden" name="fourid" id="fourid" value="">

	      </div>
	      <div class="modal-footer">
	        <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary" data-dismiss="modal">Non</button>
	        <button type="submit" onclick="javascript:window.location.reload()" class="btn btn-primary">Oui</button>
	      </div>
      </form>
    </div>
  </div>
</div>





<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">

        <button type="button" class="close" data-dismiss="modal"  onclick="javascript:window.location.reload()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modifier Le Fournisseur</h4>
      </div>
      <form action="" method="post">
          {{method_field('patch')}}
      		{{csrf_field()}}
	      <div class="modal-body">
	      		<input type="hidden" name="fourid" id="fourid" value="">
            <div class="form-group has-feedback">
              <label for="nom">Nom :</label>
              <input type="text" class="form-control" name="nom" id="nom" required placeholder="Entrer nom" value="{{old('nom')}}">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('nom', ':message') }}</span></p>
            </div>

            <div class="form-group has-feedback">
              <label for="email">Email :</label>

              <input type="email" class="form-control" name="email" id="email" required placeholder="Entrer email" value="{{old('email')}}">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('email', ':message') }}</span></p>
            </div>
            <div class="form-group has-feedback">
              <label for="telephone">Téléphone :</label>
              <input type="phoneNumber" class="form-control" name="telephone" id="telephone" required placeholder="Entrer numéro téléphone" value="{{old('telephone')}}">
              <span class="glyphicon glyphicon-phone form-control-feedback"></span>
              <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('telephone', ':message') }}</span></p>
            </div>
            <div class="form-group has-feedback">
              <label for="fax">Fax :</label>
              <input type="phoneNumber" class="form-control" name="fax" id="fax" placeholder="Entrer Fax : optionnel" value="{{old('fax')}}">
              <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
              <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('fax', ':message') }}</span></p>
            </div>
            <div class="form-group has-feedback">
              <label for="ville">Ville :</label>
              <input type="text" class="form-control" name="ville" id="ville" required placeholder="Entrer ville" value="{{old('ville')}}">
              <span class="glyphicon glyphicon-globe form-control-feedback"></span>
              <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('ville', ':message') }}</span></p>
            </div>
            <div class="form-group has-feedback">
              <label for="adresse1">Adresse :</label>
              <input type="textarea" class="form-control" name="adresse1" id="adresse1" required placeholder="Entrer adresse" value="{{old('adresse1')}}">
              <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
              <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('adresse1', ':message') }}</span></p>
            </div>
            <div class="form-group has-feedback">
              <label for="adresse2">Adresse 2 :</label>
              <input type="textarea" class="form-control" name="adresse2" id="adresse2" placeholder="Entrer 2éme adresse : optionnel " value="{{old('adresse2')}}" >
              <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
              <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('adresse2', ':message') }}</span></p>
            </div>

	      </div>
	      <div class="modal-footer bg-info">
	        <button type="button" onclick="javascript:window.location.reload()" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Fermer</button>
	        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Sauvegarder</button>

	      </div>
      </form>
    </div>
  </div>
</div>





<div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal"  onclick="javascript:window.location.reload()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Afficher Fournisseur</h4>
      </div>
      <form action="" method="post">

          {{csrf_field()}}
        <div class="modal-body">
            <input type="hidden" name="fourid" id="fourid" value="">
            <div class="form-group has-feedback">
              <label for="nom">Nom :</label>
              <input type="text" class="form-control" name="nom" id="nom"  value="{{old('nom')}}">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('nom', ':message') }}</span></p>
            </div>

            <div class="form-group has-feedback">
              <label for="email">Email :</label>
              <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('email', ':message') }}</span></p>
            </div>
            <div class="form-group has-feedback">
              <label for="telephone">Téléphone :</label>
              <input type="phoneNumber" class="form-control" name="telephone" id="telephone"  value="{{old('telephone')}}">
              <span class="glyphicon glyphicon-phone form-control-feedback"></span>
              <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('telephone', ':message') }}</span></p>
            </div>
            <div class="form-group has-feedback">
              <label for="fax">Fax :</label>
              <input type="phoneNumber" class="form-control" name="fax" id="fax"  value="{{old('fax')}}">
              <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
              <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('fax', ':message') }}</span></p>
            </div>
            <div class="form-group has-feedback">
              <label for="ville">Ville :</label>
              <input type="text" class="form-control" name="ville" id="ville" value="{{old('ville')}}">
              <span class="glyphicon glyphicon-globe form-control-feedback"></span>
              <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('ville', ':message') }}</span></p>
            </div>
            <div class="form-group has-feedback">
              <label for="adresse1">Adresse :</label>
              <input type="textarea" class="form-control" name="adresse1" id="adresse1"  value="{{old('adresse1')}}">
              <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
              <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('adresse1', ':message') }}</span></p>
            </div>
            <div class="form-group has-feedback">
              <label for="adresse2">Adresse 2 :</label>
              <input type="textarea" class="form-control" name="adresse2" id="adresse2"  value="{{old('adresse2')}}" >
              <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
              <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('adresse2', ':message') }}</span></p>
            </div>

        </div>
        <div class="modal-footer bg-success">
          <button type="button" onclick="javascript:window.location.reload()" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Fermer</button>

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

     var fourid = button.data('fourid')
     var modal = $(this)

     modal.find('.modal-body #fourid').val(fourid);
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
