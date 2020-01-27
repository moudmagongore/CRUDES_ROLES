@extends('layouts.app')

@section('content')
	<div>
		<div class="row justify-content-center">
        <div class="col-md-8">
            <img src="/storage/{{auth()->user()->avatar}}"  style="width: 150px; height: 150px; float: left; border-radius: 100%; margin-right: 25px;">

            <h2 style="margin-top: 50px;">{{Auth()->user()->nom}} {{Auth()->user()->prenom}}</h2>
        </div>
    </div>
	</div><br>
	

	<div style="margin-top: 2em; margin-bottom: 2em;">
		<form action="/modification-avatar" method="post" enctype="multipart/form-data">

			{{csrf_field()}}


			<div class="form-group">
				<label>Nouvel avatar</label>
				<input type="file" name="avatar" class="form-control {{$errors->has('avatar') ? 'is-invalid' : ''}}">

				{!!$errors->first('avatar', '<div class="invalid-feedback">:message</div>')!!}

			</div>	

			
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Modifier mon mavatar</button>
			</div>	
		</form>

	</div>


	<form action="{{ route('modification-mot-de-passe') }}" method="post">
		{{csrf_field()}}


		<div class="form-group">
			<input type="password" name="password" placeholder="Nouveau mot de passe" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}">

			{!!$errors->first('password', '<div class="invalid-feedback">:message</div>')!!}

		</div>	

		<div class="form-group">
			<input type="password" name="password_confirmation" placeholder="Mot de passe de (confirmation)" class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}">

			{!!$errors->first('password_confirmation', '<div class="invalid-feedback">:message</div>')!!}
		</div>

		
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Modifier mon mot de passe</button>
		</div>	
	</form>
@endsection