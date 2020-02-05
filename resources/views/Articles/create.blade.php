@extends('layouts.app')

<!-- Recaptcha -->
@section('extra-js')
	 {!! NoCaptcha::renderJs() !!}
@stop
<!-- End Recaptcha -->

@section('content')

<div class="card shadow mb-4">                  
	    <div class="card-body">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Articles</h6>
	        </div>

	        <form action="  " method="POST">

				{{csrf_field()}}

				<div class="form-group">
					<label class="control-label">Categories</label>
					<select class="form-control" name="categorie">
						@foreach($categories as $categorie)
						<option value="{{ $categorie->id }}"> {{ $categorie->nom }}</option>
						@endforeach
					</select>
				</div>



				<div class="form-group">
					<label class="control-label">Fournisseurs</label>
					<select class="form-control" name="fournisseur">
						@foreach($fournisseurs as $fournisseur)
						<option value="{{ $fournisseur->id }}"> {{ $fournisseur->nom }} {{ $fournisseur->prenom }} </option>
						@endforeach
					</select>
				</div>


				
				<div class="form-group">
					<label for="designation" class="control-label">designation</label>

					<input type="text" name="designation" id="designation" value=" {{old('designation')}}" class="form-control {{$errors->has('designation') ? 'is-invalid' : '' }}">

					{!!$errors->first('designation', '<div class="invalid-feedback">:message</div>')!!}
				</div>

				<div class="form-group">
					<label for="prix" class="control-label">prix</label>

					<input type="text" name="prix" id="prix" value=" {{old('prix') }}" class="form-control {{$errors->has('prix') ? 'is-invalid' : '' }}">
					
					{!!$errors->first('prix', '<div class="invalid-feedback">:message</div>')!!}
				</div>

				<div class="form-group">
					<label for="quantite" class="control-label">quantite</label>

					<input type="text" name="quantite" id="quantite" value=" {{old('quantite') }}" class="form-control  {{$errors->has('quantite') ? 'is-invalid' : '' }}">
					
					{!!$errors->first('quantite', '<div class="invalid-feedback">:message</div>')!!}
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
				
				<div class="form-group">
					<input type="submit" name="Valider" value="Valider" class="btn btn-primary">
				</div>

				
			</form>

			
	    </div> 


</div>
@endsection