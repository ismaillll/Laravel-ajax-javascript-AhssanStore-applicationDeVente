<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('app.name')}}</title>

  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ URL::to('/') }}/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::to('/') }}/fonts/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ URL::to('/') }}/fonts/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::to('/') }}/dist/css/AdminLTE.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ URL::to('/') }}/dist/css/skins/_all-skins.min.css">
<link href="{{ asset('css/semantic.min.css')}}" rel="stylesheet">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-black sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{route('home')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>ST</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Ahssan<b>Store</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"><a ></a></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>






      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

          @if(Auth::user()->role=='admin')
          <!-- Messages: style can be found in dropdown.less-->

          <li class="dropdown messages-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-check"></i>
              <span class="label label-success">{{App\Produit::where('quantite','>',8)->count()}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">vous avez {{App\Produit::where('quantite','>',8)->count()}} produits de quantité disponible</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="/produits">

                      <h4>
                        Il y a encore assez de quantité

                      </h4>

                    </a>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="/produits">voir tout les produits</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag"></i>
              <span class="label label-warning">{{App\Produit::where('quantite','<',8)->where('quantite','>',2)->count()}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">vous avez {{App\Produit::where('quantite','<',8)->where('quantite','>',2)->count()}}  produit presque fini</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-cercle text-aqua"></i>  faire attention !!
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="/produits">Voir tout les produits</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell"></i>
              <span class="label label-danger">{{App\Produit::where('quantite','<=',2)->get()->count()}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">vous avez  {{App\Produit::where('quantite','<=',2)->get()->count()}} produit fini</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        pense de faire des approvisionnements

                      </h3>
                    <!--  <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                   end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="/produits">voir tous les produits</a>
              </li>
            </ul>
          </li>@endif
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src='{{ asset('public/images/'.Auth::user()->photo) }}' class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src='{{ asset('public/images/'.Auth::user()->photo) }}' class="img-circle" alt="User Image">

                <p>
                  {{Auth::user()->name}}
                  <small>{{Auth::user()->email}}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">

                  <div class="col-xs-4 text-center">
                    <a href="/ventes">Ventes</a>
                  </div>

                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">

                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          @if(Auth::user()->role=='admin')
          <!-- Control Sidebar Toggle Button -->

          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
          @endif
        </ul>
      </div>
    </nav>

  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src='{{ asset('public/images/'.Auth::user()->photo) }}'  class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">NAVIGATION PRINCIPALE</li>
          @if(Auth::user()->role=='admin')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/dashboard"><i class="fa fa-circle-o"></i> Dashboard </a></li>

          </ul>
        </li>
        @endif

        @if(Auth::user()->role=='admin')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        </ul>
      </li>
      @endif

        <li class="treeview">
          <a href="{{ route('produit') }}">
            <i href="{{ route('produit') }}" class="fa fa-archive"></i> <span>Produit</span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>
            </span>
            @if(Auth::user()->role=='admin')
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">{{App\Produit::where('quantite','<',8)->where('quantite','>',2)->count()}} </small>
              <small class="label pull-right bg-green">{{App\Produit::where('quantite','>',8)->count()}}</small>
              <small class="label pull-right bg-red">{{App\Produit::where('quantite','<=',2)->get()->count()}}</small>
            </span>
            @endif
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('produit') }}"><i class="fa fa-circle-o"></i> Gérer Produits</a></li>

          </ul>
        </li>
        @if(Auth::user()->role=='admin')
        <li class="treeview">
          <a href="{{ route('fournisseur') }}">
            <i href="{{ route('fournisseur') }}" class="fa fa-building-o"></i> <span>Fournisseur</span>
            <span class="pull-right-container">
            </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            <span class="pull-right-container">

              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('fournisseur') }}"><i class="fa fa-circle-o"></i> Gérer Fournisseurs</a></li>

          </ul>
        </li>
        @endif




      <!--  <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('fournisseur') }}"><i class="fa fa-circle-o"></i> Fournisseurs</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>-->
        <li class="treeview">
          <a href="{{ route('marques') }}">
            <i href="{{ route('marques') }}" class="fa fa-star"></i> <span>Marques</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('marques') }}"><i class="fa fa-circle-o"></i> Gérer Marques</a></li>

          </ul>
        </li>
        <li class="treeview">
          <a href="{{ route('categories') }}">
            <i href="{{ route('categories') }}" class="fa fa-bookmark"></i> <span>Catégorie</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('categories') }}"><i class="fa fa-circle-o"></i> Gérer Marques</a></li>

          </ul>
        </li>
        <li class="treeview">
          <a href="{{ route('ventes') }}">
            <i href="{{ route('ventes') }}" class="fa fa-check"></i> <span>Ventes</span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>
            </span>
            @if(Auth::user()->role=='admin')
          <span class="pull-right-container">

            <small class="label pull-right bg-blue">{{App\Vente::all()->count()}}</small>
          </span>
          @endif
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('ventes') }}"><i class="fa fa-circle-o"></i> Gérer Ventes</a></li>

          </ul>
        </li>
        @if(Auth::user()->role=='admin')
        <li class="treeview">
          <a href="{{ route('profile') }}">
            <i href="{{ route('profile') }}" class="fa fa-user"></i> <span>Utilisateurs</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{App\User::all()->count()}}</small>

            </span>

          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('gstuser') }}"><i class="fa fa-circle-o"></i> Gérer Utilisateurs</a></li>

          </ul>
        </li>
        @endif
        <li class="treeview">
          <a href="{{ route('profile') }}">
           <i href="{{ route('profile') }}" ><img src='{{ asset('public/images/'.Auth::user()->photo) }}' style="width:26px; height:26px;" class="img-circle" alt="User Image"></i><span> Mon Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->



      <!-- Default box -->
  @yield('content')
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <h6><b><a href="{{ route('home') }}">Ahssan Store</a></b></h6>
    </div>
    <h6><strong> <a href="{{ route('home') }}"> &copy @php  echo date("Y");  @endphp   AhssanStore</a></strong></h6>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="{{ URL::to('/') }}/#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="{{ URL::to('/') }}/javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="{{ URL::to('/') }}/javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('/') }}/javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="{{ asset('js/semantic.min.js')}}"></script>
</body>
</html>
