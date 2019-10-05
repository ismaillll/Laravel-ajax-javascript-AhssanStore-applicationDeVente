<div class="container">
  <div class="col-md-8 offset-md2">
    <h2>Afiicher l'utilisateur {{ $user->name }} </h2>
    <hr>
    <div class="form-group">
      <h2>{{ $user->name }}</h2>
    </div>
    <div class="form-group">
      <h2>{{ $user->telephone }}</h2>
    </div>
    <div class="form-group">
      <h2>{{ $user->email }}</h2>
    </div>
    <div class="form-group">
      <h2>{{ $user->password }}</h2>
    </div>
    <div class="form-group">
      <h2>{{ $user->adresse }}</h2>
    </div>
    <div class="form-group">
      <h2>{{ $user->photo}}</h2>
    </div>
    <div class="form-group">
      <h2>{{ $user->role }}</h2>
    </div>


    <a class="btn btn-xs btn-danger" href="javascript:ajaxLoad('{{ url('users') }}')">Retour</a>
  </div>
</div>
