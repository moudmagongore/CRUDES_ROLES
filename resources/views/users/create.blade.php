@extends('layouts.app')

@section('content')

<form action="" method="post">

	{{csrf_field()}}

	<div class="card shadow mb-4">                  
	    <div class="card-body">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
	        </div> 

	        <div style="margin-top: 10px;" class="form-group">
	        	<label>Nom</label>
				<input type="text" name="nom" class="form-control form-control-user {{$errors->has('nom') ? 'is-invalid' : '' }}" value="{{old('nom')}}">

	            {!!$errors->first('nom', '<div class="invalid-feedback">:message</div>')!!}
	        </div>

			
			<div style="margin-top: 10px;" class="form-group">
	        	<label>Prenom</label>
				<input type="text" name="prenom" class="form-control form-control-user {{$errors->has('prenom') ? 'is-invalid' : '' }}" value="{{old('prenom')}}">

	            {!!$errors->first('prenom', '<div class="invalid-feedback">:message</div>')!!}
	        </div>

	        <div style="margin-top: 10px;" class="form-group">
	        	<label>Telephone</label>
				<input type="text" name="telephone" class="form-control form-control-user {{$errors->has('telephone') ? 'is-invalid' : '' }}" value="{{old('telephone')}}">

	            {!!$errors->first('telephone', '<div class="invalid-feedback">:message</div>')!!}
	        </div>

	        <div style="margin-top: 10px;" class="form-group">
	        	<label>Email</label>
				<input type="email" name="email" class="form-control form-control-user {{$errors->has('email') ? 'is-invalid' : '' }}" value="{{old('email')}}">

	            {!!$errors->first('email', '<div class="invalid-feedback">:message</div>')!!}
	        </div>

	        <div style="margin-top: 10px;" class="form-group">
	        	<label>Password</label>
				<input type="password" name="password" class="form-control form-control-user {{$errors->has('password') ? 'is-invalid' : '' }}" value="{{old('password')}}">

	            {!!$errors->first('password', '<div class="invalid-feedback">:message</div>')!!}
	        </div>

	        <div class="form-group">
	        	<label>Password confirmation</label>
				<input type="password" name="password_confirmation"  class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}">

				{!!$errors->first('password_confirmation', '<div class="invalid-feedback">:message</div>')!!}
			</div>





	        <div  class="form-group">
	            <button type="sumbit" class="btn btn-primary" name="Ajouter">M'inscrire</button>
	         
	        </div> 
	    </div>
	</div>
</form>

@endsection