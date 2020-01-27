@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">                  
    <div class="card-body">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Articles</h6>
        </div> 

		<table class="table">
			<thead>
				<th>FOURNISSEUR</th>
				<th>CATEGORIE</th>
				<th>DESIGNATION</th>
				<th>PRIX</th>
				<th>QUANTITE</th>
				<th>ACTIONS</th>
			</thead>

			<tbody>
				@foreach ($articles as $article)
					<tr>
<td>{{$article->fournisseur->nom}} {{$article->fournisseur->prenom}}  </td>
				<td>{{$article->categorie->nom}}</td>
						<td>{{$article->designation}}</td>
						<td>{{$article->prix}}</td> 
						<td>{{$article->quantite}}</td> 
						

						<td>

							<form action=" {{ route('destroy', $article->id) }} " method="POST" 
									onsubmit = "return confirm('Êtes-vous sûr ?');"
								>
									{{csrf_field()}}
									
									<a href="{{ route('edit-articles', $article->id) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a>
										

									<button type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger"><i class="fa fa-trash"></i></button>

							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
 		</table>

 			<div class="card-header py-3">
	            <a href="{{ route('add-articles') }}" class="m-0 font-weight-bold text-primary">Ajouter</a>
	        </div> 
	</div>
</div>

@endsection