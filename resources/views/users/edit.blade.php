@extends('layouts.app')

@section('content')

<form action=" {{ route('edit-users', $users) }} " method="post">

	{{csrf_field()}}

	<div class="card shadow mb-4">                  
	    <div class="card-body">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Modifier <strong>{{$users->nom}}</strong></h6>
	        </div> 

	        <div style="margin-top: 10px;" class="form-group">
	        	<label>Nom</label>
				<input type="text" name="nom" class="form-control form-control-user {{$errors->has('nom') ? 'is-invalid' : '' }}" value="{{old('nom') ?: $users->nom}}">

	            {!!$errors->first('nom', '<div class="invalid-feedback">:message</div>')!!}
	        </div>

			
			<div style="margin-top: 10px;" class="form-group">
	        	<label>Prenom</label>
				<input type="text" name="prenom" class="form-control form-control-user {{$errors->has('prenom') ? 'is-invalid' : '' }}" value="{{old('prenom') ?: $users->prenom}}">

	            {!!$errors->first('prenom', '<div class="invalid-feedback">:message</div>')!!}
	        </div>

	        <div style="margin-top: 10px;" class="form-group">
	        	<label>Telephon</label>
				<input type="text" name="telephone" class="form-control form-control-user {{$errors->has('telephone') ? 'is-invalid' : '' }}" value="{{old('telephone') ?: $users->telephone}}">

	            {!!$errors->first('telephone', '<div class="invalid-feedback">:message</div>')!!}
	        </div>

	        <div style="margin-top: 10px;" class="form-group">
	        	<label>Email</label>
				<input type="email" name="email" class="form-control form-control-user {{$errors->has('email') ? 'is-invalid' : '' }}" value="{{old('email') ?: $users->email}}">

	            {!!$errors->first('email', '<div class="invalid-feedback">:message</div>')!!}
	        </div>

	        



			<!-- Pour recuperer les roles -->
			@foreach($roles as $role)
				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" name="roles[]" value="{{$role->id}}" id="{{$role->id}}"       @foreach ($users->roles as $userRole)
						@if ($userRole->id === $role->id)
							checked 
						@endif
					@endforeach>

					<label for="{{$role->id}}" class="form-check-label">
						{{$role->nom}}
					</label>
				</div>
	        @endforeach




	        <div  class="form-group">
	            <button type="sumbit" class="btn btn-primary" name="Ajouter">Modifier les informations</button>
	         
	        </div> 


	    </div>
	</div>
</form>

@endsection