@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>

      <small><span class="glyphicon glyphicon-user"></span>  Profile d'utilisateur</small>

    </h1>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{route('profile')}}">Profile</a></li>
    </ol>

  <section class="content">

    <!-- Default box -->
    <div class="box box-info">
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
             @endif

             <div class="col-md-3">

                  <!-- Profile Image -->
                  <div class="box box-primary">
                    <div class="box-body box-profile">
                      <img class="profile-user-img img-responsive img-circle" src="{{ URL::to('/') }}/images/ismail.jpg"  alt="User profile picture">

                      <h3 class="profile-username text-center">Nina Mcintire</h3>

                      <p class="text-muted text-center">Software Engineer</p>

                      <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                          <b>Followers</b> <a class="pull-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                          <b>Following</b> <a class="pull-right">543</a>
                        </li>
                        <li class="list-group-item">
                          <b>Friends</b> <a class="pull-right">13,287</a>
                        </li>
                      </ul>

                      <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->

                  <!-- About Me Box -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                      <p class="text-muted">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                      </p>

                      <hr>

                      <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                      <p class="text-muted">Malibu, California</p>

                      <hr>

                      <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                      <p>
                        <span class="label label-danger">UI Design</span>
                        <span class="label label-success">Coding</span>
                        <span class="label label-info">Javascript</span>
                        <span class="label label-warning">PHP</span>
                        <span class="label label-primary">Node.js</span>
                      </p>

                      <hr>

                      <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>




                <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Activity</a></li>
              <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Timeline</a></li>
              <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Sent you a message - 3 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <form class="form-horizontal">
                    <div class="form-group margin-bottom-none">
                      <div class="col-sm-9">
                        <input class="form-control input-sm" placeholder="Response">
                      </div>
                      <div class="col-sm-3">
                        <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Posted 5 photos - 5 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="row margin-bottom">
                    <div class="col-sm-6">
                      <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <img class="img-responsive" src="../../dist/img/photo2.png" alt="Photo">
                          <br>
                          <img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <img class="img-responsive" src="../../dist/img/photo4.jpg" alt="Photo">
                          <br>
                          <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <div class="col-md-12">
            <div class="row">
             <!-- Profile Image -->
             <div class="box box-primary">
             </br>
               <button style='float:right' type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#add">
                 <i class="glyphicon glyphicon-plus"> </i> Ajouter Utilisateur
               </button>
                <h3 class="box-title"><span class="glyphicon glyphicon-list"></span>  Liste Utilisateurs</h3>


            </div>

               <div class="table table-responsive table table-striped">
    <table class="table table-bordered  table-striped" id="table">
      <tr>
        <th><button  type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#add">
          <i class="glyphicon glyphicon-plus"> </i>
        </button></th>
        <th>Nom</th>
        <th>Téléphone</th>
        <th>Email</th>

        <th>Adresse </th>
        <th>Photo</th>
        <th>role</th>
        <th>Vente</th>
        <th>Crée le</th>
        <th>Modifier le</th>

      </tr>
      {{ csrf_field() }}

      @foreach ($user as $value)
        <tr >

          <td>

            <a href="#" class=" btn btn-info btn-xs" data-toggle="modal" data-target="#show" >
              <i class="fa fa-eye"></i>
            </a> href="{{action('FournisseurController@edit', $value->id)}}"
            <a href="{{action('UtilisateurController@edit', $value->id)}}" class=" btn btn-warning btn-xs">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="#" class=" btn btn-danger btn-xs" data-userid="{{$value->id}}" data-toggle="modal" data-target="#delete">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
          </td>
          <td>{{ $value->name }}</td>
          <td>{{ $value->email }}</td>
          <td>{{ $value->telephone }}</td>
          <td>{{ $value->adresse }}</td>
          @if (empty($value->photo))
          <td><p class="text-center">vide</p></td>
          @else
         <td>{{ $value->photo }}</td>
          @endif
          @if($value->role==1)
          <td>admin</td>
          @else
          <td>user</td>
          @endif
         <td><a href="/venteForUser/{{$value->id}}" class="ui pointing black basic label"></a></td>
         <td>{{ $value->created_at  }}</td>
         <td>{{ $value->updated_at   }}</td>

        </tr>
      @endforeach
    </table>
      </div>
      Affichage de {{ $user->firstItem() }} à {{ $user->lastItem() }} sur {{ $user->total() }} entrées (page {{ $user->currentPage() }} )

             </div>
             {{$user->links()}}

               <!-- /.box-body -->
         </div>
             <!-- /.box -->


    </div>

</div>
</section>
</div>
<!-- modal add-->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-target="#myModal" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal"  onclick="javascript:window.location.reload()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>Ajouter Utilisateur </b></h4>
      </div>
      <form action="{{ route('addUser') }}" method="post" id="Register">
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
                      <div class="form-group has-feedback ">
          		        	<label for="name">Nom :</label>
          		        	<input type="text" class="form-control" name="name" id="name" required placeholder="Entrer nom" value="{{old('name')}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                      <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('name', ':message') }}</span></p>
          	        	</div>
                      <div class="form-group has-feedback ">
                        <label for="telephone">Téléphone :</label>
                        <input type="phoneNumber" class="form-control" name="telephone" id="telephone" required placeholder="Entrer numéro téléphone" value="{{old('telephone')}}">
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('telephone', ':message') }}</span></p>
                      </div>
                      <div class="form-group has-feedback ">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control" name="email" id="email" required placeholder="Entrer email" value="{{old('email')}}">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('email', ':message') }}</span></p>
                      </div>
                      <div class="form-group has-feedback ">
                        <label for="someSwitchOptionPrimary">Password :</label>
                        <input type="password" class="form-control" placeholder="password"  name="password" id="password"  value="{{old('password')}}">
                        <!--<img src="{{ URL::to('/') }}/dist/img/eye.png}}" onmouseover="mouseoverPass();" onmouseout="mouseoutPass();" />-->
                        <span class="glyphicon glyphicon-eye-open form-control-feedback"></span>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('password', ':message') }}</span></p>
                        <input type="checkbox" onclick="myFunction()"> Afficher Password
                      </div>
                      <div class="form-group has-feedback ">
                        <label for="adresse">Adresse :</label>
                        <input type="textarea" class="form-control" name="adresse" id="adresse" required placeholder="Entrer adresse" value="{{old('adresse')}}">
                        <span class="glyphicon glyphicon-globe form-control-feedback"></span>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('adresse', ':message') }}</span></p>
                      </div>
                      <div class="form-group has-feedback">
                        <label for="photo">Image :</label>
                        <input type="file" class="form-control-file" name="photo" id="photo" required  value="{{old('photo')}}">
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('photo', ':message') }}</span></p>
                      </div>
                      <div class="control-group">
                        <b>Type : </b>
                       	<label class="control control--radio"> Admin
	                       	<input type="radio" value="admin" name="role" />
	                       	<div class="control__indicator"></div>
                       	</label>
                       	<label class="control control--radio"> User
	                       	<input type="radio" value="user" name="role" checked="checked"/>
	                       	<div class="control__indicator"></div>
	                       </label>
                        <p style="color:red;"><span style="color:red;" class="help-block">{{ $errors->first('role', ':message') }}</span></p>
                      </div>

	      </div>
	      <div class="modal-footer bg-info">
	        <button type="button" class="btn btn-danger btn-xs" onclick="javascript:window.location.reload()" data-dismiss="modal" ><span class="glyphicon glyphicon-remove"></span> Fermer</button>

	        <button type="submit"  class="btn btn-info btn-xs" ><span class="glyphicon glyphicon-log-in"></span> Enregistrer</button>
	      </div>
      </form>
    </div>
  </div>
</div>



<div class="modal fade"  class="btn btn-info btn-lg" id="delete" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <button type="button" class="close" data-dismiss="modal"  onclick="javascript:window.location.reload()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Confirmer la suppression</h4>
      </div>
      <form action="{{route('destroyUser')}}" method="post">

           {{ csrf_field() }}
	      <div class="modal-body">
				<p class="text-center">
					Êtes-vous sûr de vouloir supprimer ceci?
				</p>
	      		<input type="hidden" name="userid" id="userid" value="">

	      </div>
	      <div class="modal-footer">
	        <button type="button" onclick="javascript:window.location.reload()" class="btn btn-danger btn-xs" data-dismiss="modal">Non</button>
	        <button type="submit" onclick="javascript:window.location.reload()" class="btn btn-info btn-xs">Oui</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

$('#delete').on('show.bs.modal', function (event) {

     var button = $(event.relatedTarget)

     var userid = button.data('userid')
     var modal = $(this)

     modal.find('.modal-body #userid').val(userid);
})

function mouseoverPass(obj) {
  var obj = document.getElementById('password');
  obj.type = "text";
}
function mouseoutPass(obj) {
  var obj = document.getElementById('password');
  obj.type = "password";
}

$('#password + .glyphicon').on('click', function() {
  $(this).toggleClass('glyphicon-eye-close').toggleClass('glyphicon-eye-open');
  $('#password').togglePassword();
});
</script>

@if(count($errors) > 0 )
<script type="text/javascript">
        $(window).on('load', function () {
        $('#add').modal('show');
    });

</script>
@endif
@endsection
