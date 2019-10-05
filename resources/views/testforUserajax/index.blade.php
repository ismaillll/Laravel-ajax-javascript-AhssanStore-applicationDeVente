<div class="container">

    <div class="row">
        <div class="col-sm-7">
          <h3>Laravel CRUD, Search, Sort - AJAX</h3>
        </div>
        <div class="col-sm-5">
          <div class="pull-right">
            <div class="input-group">
                <input class="form-control" id="search"
                       value="{{ request()->session()->get('search') }}"
                       onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('users')}}?search='+this.value)"
                       placeholder="Search Title" name="search"
                       type="text" id="search"/>
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-primary"
                            onclick="ajaxLoad('{{url('users')}}?search='+$('#search').val())">
                            <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
            </div>

          </div>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>

            <th width="60px">No</th>
            <th><a href="javascript:ajaxLoad('{{url('users?field=name&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Nom</a>
                {{request()->session()->get('field')=='name'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>

            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('users?field=telephone&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Télephone
                </a>
                {{request()->session()->get('field')=='telephone'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>

            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('users?field=email&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Email
                </a>
                {{request()->session()->get('field')=='email'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>

            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('users?field=adresse&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Adresse
                </a>
                {{request()->session()->get('field')=='adresse'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>

            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('users?field=photo&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Image
                </a>
                {{request()->session()->get('field')=='photo'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>

            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('users?field=role&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Role
                </a>
                {{request()->session()->get('field')=='role'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>

            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('users?field=id_vente&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Vente
                </a>
                {{request()->session()->get('field')=='id_vente'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>

            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('users?field=created_at&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Crée le
                </a>
                {{request()->session()->get('field')=='created_at'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>

            <th style="vertical-align: middle">
              <a href="javascript:ajaxLoad('{{url('users?field=updated_at&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                Modifier le
              </a>
              {{request()->session()->get('field')=='updated_at'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>
            <th width="160px" style="vertical-align: middle">
              <a href="javascript:ajaxLoad('{{url('users/create')}}')"
                 class="btn btn-primary btn-xs"> <i class="fa fa-plus" aria-hidden="true"></i> Nv Utilisateur</a>
            </th>
        </tr>
        </thead>
        <tbody>
        @php
            $i=1;
        @endphp
        @foreach ($users as $user)
          <tr>
            <th>{{$i++}}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->telephone }}</td>
            <td>{{ $user->password }}</td>
            <td>{{ $user->adresse }}</td>
            <td>{{ $user->photo }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->id_vente }}</td>
            <td>{{ $user->created_at  }}</td>
            <td>{{ $user->updated_at   }}</td>
            <td>
              <a class="btn btn-info btn-xs" title="Show"
                 href="javascript:ajaxLoad('{{url('users/show/'.$user->id)}}')">
                  Afiicher</a>
                <a class="btn btn-warning btn-xs" title="Edit"
                   href="javascript:ajaxLoad('{{url('users/update/'.$user->id)}}')">
                    Modifier</a>
                <input type="hidden" name="_method" value="delete"/>
                <a class="btn btn-danger btn-xs" title="Delete"
                   href="javascript:if(confirm('Êtes-vous sûr de vouloir supprimer?')) ajaxDelete('{{url('users/delete/'.$user->id)}}','{{csrf_token()}}')">
                    Supprimer
                </a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>

        <ul class="pagination">
            {{ $users->links() }}
        </ul>
</div>
