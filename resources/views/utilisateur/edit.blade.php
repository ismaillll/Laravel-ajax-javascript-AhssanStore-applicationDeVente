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
        <h2>Modifier utilisateur  : </h2><br  />




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
@endsection
