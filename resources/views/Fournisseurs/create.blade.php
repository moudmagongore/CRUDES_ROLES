@extends('layouts.app')

@section('content')

<form action="" method="post">

	{{csrf_field()}}

	<div class="card shadow mb-4">                  
	    <div class="card-body">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Fournisseur</h6>
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


	        <div  class="form-group">
	            <button type="sumbit" class="btn btn-primary" name="Ajouter">Ajouter fournisseur</button>
	         
	        </div> 

	        
	    </div>
	</div>
</form>

@endsection