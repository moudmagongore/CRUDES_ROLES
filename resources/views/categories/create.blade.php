@extends('layouts.app')

<!-- Recaptcha -->
@section('extra-js')
	 {!! NoCaptcha::renderJs() !!}
@stop
<!-- End Recaptcha -->

@section('content')

<form action="" method="post">

	{{csrf_field()}}

	<div class="card shadow mb-4">                  
	    <div class="card-body">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Catégorie</h6>
	        </div> 

	        <div style="margin-top: 10px;" class="form-group">
	        	<label>Nom</label>
				<input type="text" name="nom" class="form-control form-control-user {{$errors->has('nom') ? 'is-invalid' : '' }}" value="{{old('nom')}}">

	            {!!$errors->first('nom', '<div class="invalid-feedback">:message</div>')!!}
	        </div>

	        <!-- Recaptcha -->
				<div class="form-group">
					{!! NoCaptcha::display() !!}

					@if ($errors->has('g-recaptcha-response'))
					    <span class="help-block">
					        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
					    </span>
					@endif
				</div>
				<!-- End Recaptcha -->

			
	        <div  class="form-group">
	            <button type="sumbit" class="btn btn-primary" name="Ajouter">Ajouter categorie</button>
	         
	        </div> 

	        
	    </div>
	</div>
</form>

@endsection