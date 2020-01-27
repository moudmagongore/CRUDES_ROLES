@extends('layouts.app')

@section('content')

<form action="{{ route('edit-article', $articles->id) }}" method="post">

	{{csrf_field()}}

	<div class="card shadow mb-4">                  
	    <div class="card-body">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Article</h6>
	        </div> 



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



	        <div style="margin-top: 10px;" class="form-group">
	        	<label>Désignation</label>
				<input type="text" name="designation" class="form-control form-control-user {{$errors->has('designation') ? 'is-invalid' : '' }}" value="{{old('designation') ?: $articles->designation}}">

	            {!!$errors->first('designation', '<div class="invalid-feedback">:message</div>')!!}
	        </div>



	        <div style="margin-top: 10px;" class="form-group">
	        	<label>Prix</label>
				<input type="text" name="prix" class="form-control form-control-user {{$errors->has('prix') ? 'is-invalid' : '' }}" value="{{old('prix') ?: $articles->prix}}">

	            {!!$errors->first('prix', '<div class="invalid-feedback">:message</div>')!!}
	        </div>



	        <div style="margin-top: 10px;" class="form-group">
	        	<label>Quantité</label>
				<input type="text" name="quantite" class="form-control form-control-user {{$errors->has('quantite') ? 'is-invalid' : '' }}" value="{{old('quantite') ?: $articles->quantite}}">

	            {!!$errors->first('quantite', '<div class="invalid-feedback">:message</div>')!!}
	        </div>

			

	        <div  class="form-group">
	            <button type="sumbit" class="btn btn-primary" name="Ajouter">Modifier article</button>
	         
	        </div> 
	    </div>
	</div>
</form>

@endsection