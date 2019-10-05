<div class="container">
    <div class="col-md-8 offset-md-2">
        <h1>{{isset($user)?'Edit':'New'}} Utilisateur</h1>
        <hr/>
        @if(isset($user))
            {!! Form::model($user,['method'=>'put','id'=>'frm']) !!}
        @else
            {!! Form::open(['id'=>'frm']) !!}
        @endif
        <div class="form-group row required">
            {!! Form::label("name","Nom",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("name",null,["class"=>"form-control".($errors->has('name')?" is-invalid":""),"autofocus",'placeholder'=>'nom']) !!}
                <span id="error-name" class="invalid-feedback"></span>
            </div>
        </div>
        <div class="form-group row required">
            {!! Form::label("telephone","Téléphone",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("telephone",null,["class"=>"form-control".($errors->has('telephone')?" is-invalid":""),"autofocus",'placeholder'=>'telephone']) !!}
                <span id="error-telephone" class="invalid-feedback"></span>
            </div>
        </div>
        <div class="form-group row required">
            {!! Form::label("email","Email",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("email",null,["class"=>"form-control".($errors->has('email')?" is-invalid":""),"autofocus",'placeholder'=>'email']) !!}
                <span id="error-email" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("password","Password",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("password",null,["class"=>"form-control".($errors->has('password')?" is-invalid":""),'placeholder'=>'password']) !!}
                <span id="error-password" class="invalid-feedback"></span>
            </div>
        </div>
        <div class="form-group row required">
            {!! Form::label("adresse","Adresse",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::textarea("adresse",null,["class"=>"form-control".($errors->has('adresse')?" is-invalid":""),'placeholder'=>'adresse']) !!}
                <span id="error-adresse" class="invalid-feedback"></span>
            </div>
        </div>
        <div class="form-group ">
            {!! Form::label("photo","Photo",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("photo",null,["class"=>"form-control".($errors->has('photo')?" is-invalid":""),'placeholder'=>'photo']) !!}
                <span id="error-photo" class="invalid-feedback"></span>
            </div>
        </div>
        <div class="form-group row required">
            {!! Form::label("role","Role",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("role",null,["class"=>"form-control".($errors->has('role')?" is-invalid":""),'placeholder'=>'role']) !!}
                <span id="error-role" class="invalid-feedback"></span>
            </div>
        </div>
        <div class="form-group ">
            {!! Form::label("id_vente","Vente",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("id_vente",null,["class"=>"form-control".($errors->has('id_vente')?" is-invalid":""),'placeholder'=>'vente']) !!}
                <span id="error-id_vente" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-3 col-lg-2"></div>
            <div class="col-md-4">
                <a href="javascript:ajaxLoad('{{url('users')}}')" class="btn btn-danger btn-xs">
                    Back</a>
                {!! Form::button("Enregistrer",["type" => "submit","class"=>"btn btn-primary btn-xs"])!!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
