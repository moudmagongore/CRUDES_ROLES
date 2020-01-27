@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">                  
	    <div class="card-body">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">#{{$users->count()}} Users</h6>
	        </div> 
	
			<table class="table">
				<thead>
					<th>NOM</th>
					<th>PRENOM</th>
					<th>TELEPHONE</th>
					<th>EMAIL</th>
					<th>RÔLES</th>
					@can('edit-users')
					<th>ACTIONS</th>
					@endcan
				</thead>

				<tbody>
					@foreach ($users as $user)
						<tr>
						
							<td>
								@can('suspendre-users')
									@if($user->statut == 0)
										<i style="color: red;" class="fa fa-times" aria-hidden="true"></i>

									@endif
								@endcan

								{{$user->nom}}
							</td>
							<td>{{$user->prenom}}</td>
							<td>{{$user->telephone}}</td>
							<td>{{$user->email}}</td>
							
							<!-- on appel la function roles() qui fait appel a la relation many to many ensuite get() pour recuperer la collection et sur cette collection on appel pluck('nom') pour recuperer uniquement les nom , ensuite on chaine avec la methode toArray() qui permet de recuperer un array ensuite implode pour recuperer le role de chaque utilisateur et de le separer par une virgule -->
							<td>
								{{implode(', ', $user->roles()->get()->pluck('nom')->toArray())}}
							</td>

							<td>

								<form action="{{ route('destroy', $user) }}" method="POST" 
										onsubmit = "return confirm('Êtes-vous sûr ?');"
									>
										{{csrf_field()}}
										
										@can('edit-users')
											<a href=" {{ route('edit-users', $user) }} " class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a>
										@endcan

										@can('delete-users')
											<button type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger"><i class="fa fa-trash"></i></button>
										@endcan


									@can('suspendre-users')
										@if($user->statut == 1)
											<a href=" {{route('statut', $user->id)}} " class="btn btn-warning">Suspendre</a>
										@else
											<a href="{{route('statut', $user->id)}}" class="btn btn-success">Actif</a>
										@endif
									@endcan
								</form>
									

							</td>
						</tr>
					@endforeach
				</tbody>
	 		</table>
				
			 		<div class="card-header py-3">
			            <a href="{{ route('add-users') }}" class="m-0 font-weight-bold text-primary">Ajouter</a>
			        </div> 
			    
		</div>
</div>

@endsection