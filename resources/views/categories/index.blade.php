@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">                  
    <div class="card-body">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Categorie</h6>
        </div> 

		<table class="table">
			<thead>
				<th>NOM</th>
				<th>ACTIONS</th>
			</thead>

			<tbody>
				@foreach ($categories as $categorie)
					<tr>
						<td>{{$categorie->nom}}</td>
						

						<td>

							<form action=" {{ route('destroy', $categorie->id) }} " method="POST" 
									onsubmit = "return confirm('Êtes-vous sûr ?');"
								>
									{{csrf_field()}}
									
									<a href=" {{ route('edit-categories', $categorie->id) }} " class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a>

									<button type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger"><i class="fa fa-trash"></i></button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
 		</table>

 			<div class="card-header py-3">
	            <a href="{{ route('add-categories') }}" class="m-0 font-weight-bold text-primary">Ajouter</a>
	        </div>
	</div>
</div>

@endsection