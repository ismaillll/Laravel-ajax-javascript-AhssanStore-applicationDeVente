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
    </ol><br>
    <form  action="/searchVente" method="get">

   <div style='float:left' class="input-group input-group-sm input-group col-md-3">
               <input name="searchCategorie" placeholder="Cherche..." type="text" class="form-control">
                   <span class="input-group-btn">
                     <button type="submit" class="btn btn-info btn-flat"><i class="glyphicon glyphicon-search"></i></button>
                   </span>
             </div></br><br>
    </form>
  <section class="content">

    <!-- Default box -->
    <div class="box box-">
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
        @if(Session::has('message'))
             <div class="alert alert-info" >
               <p style="text-align:center">{{ Session::get('message')}}</p>
             </div>
             <button href="{{route('categories')}}" style='float:left' type="button" class="btn btn-danger btn-xs" data-toggle="modal" >

               <a style='color:White' href="{{route('categories')}}">Retour</a></li>
             </button>
          </br>
          </br>
             @endif
             @if(Session::has('qte'))
                  <div class="alert alert-danger" >
                    <p style="text-align:center">{{ Session::get('qte')}}</p>
                  </div>

               </br>
               </br>
                  @endif
        <div class="table table-responsive table table-striped">
    <table class="table table-bordered  table-striped"   id="table">
      <thead>


      <tr>
        <!--<th class="text-center" width="100px">
          <a href="#" class="create-modal btn btn-success btn-sm" data-toggle="modal" data-target="#add">
            <i class="glyphicon glyphicon-plus"></i>
          </a>
          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#add">
            <i class="glyphicon glyphicon-plus"></i>
          </button>

        </th>-->
        <th tyle='float:center' class="text-center" width="100px">
          <!--<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#add">-->
          <button onclick="location.href='{{ url('ajouterCategorie') }}'" type="button" class="btn btn-primary btn-xs"  >
            <i class="glyphicon glyphicon-plus"></i>
          </button>
        </th>




        <th>Nom Catégorie</th>

        <th>Crée le</th>
        <th>Modifier le</th>



      </tr>
      </thead>
      {{ csrf_field() }}
      <?php  $no=1; ?>
      @foreach ($categories as $value)
      <tbody>
        <tr >
        <!--  <td class="text-center" style='float:center'>

            <a href="#" class=" btn btn-primary btn-xs" data-toggle="modal" data-target="#show" >
              <i class="fa fa-eye"></i>
            </a>
            <a href="{{action('ProduitController@edit', $value->id)}}" class=" btn btn-warning btn-xs">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="#" class=" btn btn-danger btn-xs" data-produit_id="{{$value->id}}" data-toggle="modal" data-target="#delete">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
          </td>-->

          <td class="text-center" style='float:center'>

            <a href="" class=" btn btn-danger btn-xs" data-categorie_id="{{$value->id}}" data-toggle="modal" data-target="#delete">
                <i class="glyphicon glyphicon-trash"></i>
              </a>
              <a href="{{action('CategorieController@edit' , $value->id)}}" class=" btn btn-warning btn-xs">
                <i class="glyphicon glyphicon-pencil"></i>
              </a>

            </td>

          <td><a class="ui basic label">{{ $value->nom }}</a></td>
        <!--  @if(empty($value->parent_id))
          <td>pas de categorie parent</td>
          @else
          <td><a class="ui grey label">{{ $value->categorie->nom}}</a></td>
          @endif-->
          <td><a class="ui  label">{{ $value->created_at }}</a></td>
          <td><a class="ui  label">{{ $value->updated_at }}</a></td>


        </tr>
      @endforeach
    </tbody>
    </table>
      </div>
      Affichage de {{ $categories->firstItem() }} à {{ $categories->lastItem() }} sur {{ $categories->total() }} entrées (page {{ $categories->currentPage() }} )

      <div class="box-footer">
      {{$categories->links()}}
      </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
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
              <form action="{{route('destroyCategorie')}}" method="post">

                   {{ csrf_field() }}
        	      <div class="modal-body">
        				<p class="text-center">
        					Êtes-vous sûr de vouloir supprimer ceci?
        				</p>
        	      		<input type="hidden" name="categorie_id" id="categorie_id" value="">

        	      </div>
        	      <div class="modal-footer">
                  <button type="button" onclick="javascript:window.location.reload()" class="btn btn-danger btn-xs" data-dismiss="modal">Non</button>
                  <button type="submit" onclick="javascript:window.location.reload()" class="btn btn-info btn-xs">Oui</button>
        	      </div>
              </form>
            </div>
          </div>
        </div>

        <script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
        <script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
        <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
        <script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
        <script src="{{asset('js/app.js')}}">
        $(function() {
       $('#table').DataTable({
           processing: true,
           serverSide: true,
           ajax: 'https://datatables.yajrabox.com/eloquent/basic-data'
       });
   });
 </script>

        <script>
        $('#delete').on('show.bs.modal', function (event) {

             var button = $(event.relatedTarget)

             var categorie_id = button.data('categorie_id')
             var modal = $(this)

             modal.find('.modal-body #categorie_id').val(categorie_id);
        })
      </script>



@endsection
