@extends('layouts.app')

@section('content')

<form action="" method="post">

	{{csrf_field()}}

	<div class="card shadow mb-4">                  
	    <div class="card-body">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Connexion</h6>
	        </div> 

	        <!-- Pour ajouter le message flash -->
			  @if(session('danger'))
			    <div class="alert alert-danger">
			      {{ session('danger') }}
			    </div>
			  @endif

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

			
	        <div  class="form-group">
	            <button type="sumbit" class="btn btn-primary" name="Ajouter">Connexion</button>
	         
	        </div> 
	    </div>
	</div>
</form>

@endsection