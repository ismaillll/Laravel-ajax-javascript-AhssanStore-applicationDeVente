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
    </ol><br>
    <form  action="/searchMarque" method="get">

   <div style='float:left' class="input-group input-group-sm input-group col-md-3">
               <input name="searchMarque" placeholder="Cherche..." type="text" class="form-control">
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
             <button href="{{route('marques')}}" style='float:left' type="button" class="btn btn-danger btn-xs" data-toggle="modal" >

               <a style='color:White' href="{{route('marques')}}">Retour</a></li>
             </button>
          </br>
          </br>
             @endif
        <div class="table table-responsive table table-striped">
    <table class="table table-bordered  table-striped" id="table">
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
        <button onclick="location.href='{{ url('ajouterMarque') }}'" type="button" class="btn btn-primary btn-xs"  >
          <i class="glyphicon glyphicon-plus"></i>
        </button>
      </th>

        <th>ID</th>
        <th>Nom</th>
        <th>Image</th>
        <th>Crée le</th>
        <th>Modifier le</th>

      </tr>
      {{ csrf_field() }}
      <?php  $no=1; ?>
      @foreach ($marques as $value)
        <tr >
          <td class="text-center" style='float:center'>

            <!--<a href="#" class=" btn btn-primary btn-xs" data-toggle="modal" data-target="#show" >
              <i class="fa fa-eye"></i>
            </a>-->
            <a href="{{action('MarqueController@edit' , $value->id)}}" class=" btn btn-warning btn-xs">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="#" class=" btn btn-danger btn-xs" data-marque_id="{{$value->id}}" data-toggle="modal" data-target="#delete">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
          </td>



          <td>{{ $value->id }}</td>
          <td><a class="ui basic label">{{ $value->nom }}</a></td>
          @if (empty($value->logo))
          <td><p class="text-center">pas d'image</p></td>
          @else
          <td><img src='{{ asset('public/images/'.$value->logo) }}' style="width:70px; height:35px; float:left; border-radius:00%; margin-right:00px;"></td>
           @endif


          <td><a class="ui   label">{{ $value->created_at }}</a></td>
          <td><a class="ui   label">{{ $value->updated_at }}</a></td>

        </tr>
      @endforeach
    </table>
      </div>
      Affichage de {{ $marques->firstItem() }} à {{ $marques->lastItem() }} sur {{ $marques->total() }} entrées (page {{ $marques->currentPage() }} )

      <div class="box-footer">
      {{$marques->links()}}
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
              <form action="{{route('destroyMarque')}}" method="post">

                   {{ csrf_field() }}
        	      <div class="modal-body">
        				<p class="text-center">
        					Êtes-vous sûr de vouloir supprimer ceci?
        				</p>
        	      		<input type="hidden" name="marque_id" id="marque_id" value="">

        	      </div>
        	      <div class="modal-footer">
                  <button type="button" onclick="javascript:window.location.reload()" class="btn btn-danger btn-xs" data-dismiss="modal">Non</button>
                  <button type="submit" onclick="javascript:window.location.reload()" class="btn btn-info btn-xs">Oui</button>
        	      </div>
              </form>
            </div>
          </div>
        </div>

        <script srcz="{{asset('js/app.js')}}"></script>
        <script>
        $('#delete').on('show.bs.modal', function (event) {

             var button = $(event.relatedTarget)

             var marque_id = button.data('marque_id')
             var modal = $(this)

             modal.find('.modal-body #marque_id').val(marque_id);
        })
      </script>
@endsection
