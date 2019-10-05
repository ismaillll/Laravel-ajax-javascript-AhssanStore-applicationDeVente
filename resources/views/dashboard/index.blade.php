@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <small><span class="fa fa-dashboard"></span> <a class="ui grey tag label" style="color:black;" href="{{route('dashboard')}}">Dashboard</a></small>


    </h1>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{route('dashboard')}}">Dashboard</a></li>
    </ol>

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-">
            <div class="inner">

              <h3>{{App\Vente::all()->count()}}</h3>

              <p>Ventes</p>
            </div>
            <div class="icon">
              <i class="fa fa-check"></i>
            </div>
            <a href="/ventes" class="small-box-footer">plus d'infos<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-">
            <div class="inner">
              <h3>{{App\User::all()->count()}}</h3>

              <p>Utilisateurs</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="/gstuser" class="small-box-footer">plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-">
            <div class="inner">
              <h3>{{App\Produit::all()->count()}}</h3>

              <p>Produits</p>
            </div>
            <div class="icon">
              <i class="fa fa-archive"></i>
            </div>
            <a href="/produits" class="small-box-footer">plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-">
            <div class="inner">
              <h3>{{App\Marque::all()->count()}}</h3>

              <p>Marques</p>
            </div>
            <div class="icon">
              <i class="fa fa-star"></i>
            </div>
            <a href="/marques" class="small-box-footer">plus d'infos  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

      </div>
      <div class="col-md-6">
        <div class="nav-tabs-custom">
      <!-- Tabs within a box -->
      <ul class="nav nav-tabs pull-right">

        <li class="pull-left header"><i class="fa fa-area-chart"></i> Ventes</li>
        <canvas id="line-chart" width="800" height="450"></canvas>
      </ul>
      <div class="tab-content no-padding">
        <!-- Morris chart - Sales -->

      </div>
      </div>
      </div>


            <div class="col-md-6">

              <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">

              <li class="pull-left header"><i class="fa fa-bar-chart-o "></i> Etat de Produits</li>
              <canvas id="bar-chart" width="800" height="450"></canvas>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->

            </div>
            </div>


          </div>
      <div class="row">
              <div class="col-md-6">
                    <!-- USERS LIST -->
                    <div class="box box-">
                      <div class="box-header with-border">
                        <h3 class="box-title">Liste Utilisateurs </h3>

                        <div class="box-tools pull-right">
                          <span class="label label-danger">{{App\user::all()->count()}}  Utilisateure (s)</span>
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                          </button>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body no-padding">
                        <ul class="users-list clearfix">
                          @foreach( $userdash as  $userdashboard )
                          <li>
                            <a class="users-list-name" >{{$userdashboard->name}}</a>
                            <span class="users-list-date">{{$userdashboard->role}}</span>
                            <img src='{{ asset('public/images/'.$userdashboard->photo) }}' style="width:100px; height:100px; float:left; border-radius:50%; margin-right:25px;" alt="User Image">


                          </li>
                          @endforeach

                        </ul>
                        <!-- /.users-list -->
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer text-center">
                        <a href="/gstuser" class="uppercase">Voir tout</a>
                      </div>
                      <!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                  </div>
                  <!-- /.col -->

                  <div class="row">
                    <div class="col-md-3 col-sm-6 ">
                      <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-building-o"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Fournisseurs</span>
                          <span class="info-box-number">{{App\Fournisseur::all()->count()}}</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-bookmark"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Catégories</span>
                          <span class="info-box-number">{{App\Categorie::all()->count()}}</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
            </div>

            </div>








</section>
</div>


<script type="text/javascript">

new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: [
      @foreach ($salesSatistics as $key => $sales)
        "{{ $key  +1 }}",
      @endforeach
    ],    datasets: [{
        data: [
            @foreach ($salesSatistics as $key => $sales)
              {{ $sales->count}},
            @endforeach
        ],
        label: "Ventes",
        borderColor: "#3e95cd",
        fill: true
      },
    ]
  },
  options: {
    legend: { display: true },
          title: {
            display: true,
            text: 'Bilan des ventes'
          }

  }
});


var total=({{App\Produit::all()->count()}} );
var dispo = ({{App\Produit::where('quantite','>',8)->count()}} );
var presque = ({{App\Produit::where('quantite','<',8)->where('quantite','>',2)->count()}});
var fini = ({{App\Produit::where('quantite','<=',2)->get()->count()}});

new Chart(document.getElementById("bar-chart"), {

    type: 'line',

    data: {

      labels: ["Disponible", "Presque Fini", "Fini"],
      datasets: [
        {
          label: "Produit(s)",
          backgroundColor: ["#3cba9f", "orange","#c45850"],
         data: [dispo,presque,fini]
        }
      ]
    },

    options: {
  legend: { display: false },
  title: {
         display: true,
         text: 'Etat des produits en stock'
       },
      scales: {
 yAxes: [{
   id: 'y-axis-0',
   gridLines: {
     display: true,
     lineWidth: 1,
     color: "rgba(0,0,0,0.30)"
   },
   ticks: {
     beginAtZero:true,
     mirror:false,
     suggestedMin: 0,
     suggestedMax: 6,
   },
   afterBuildTicks: function(chart) {

   }
 }],
 xAxes: [{
   id: 'x-axis-0',
   gridLines: {
     display: false
   },
   ticks: {
     beginAtZero: true
   }
 }]
}
     }
});
</script>



@endsection
