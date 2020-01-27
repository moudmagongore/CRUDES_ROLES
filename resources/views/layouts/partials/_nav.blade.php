<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
	  <a class="navbar-brand" href="{{ route('accueil') }}">
	    <img src="{{ asset('logo/gngg.png') }}" width="100" height="30" class="d-inline-block align-top rounded" alt="" style="margin-right: -30px;">
	  APPLICATIONS
	  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto">
			
	    	@guest
		      <li class="nav-item active">
		        <a class="nav-link disabled" href="{{ route('login') }}">LOGIN</a>
		      </li>

		      <li class="nav-item active">
		        <a class="nav-link disabled" href="{{ route('add-users') }}">REGISTER</a>
		      </li>
	      	@else 

		      	@if(Auth::user()->statut == 1)
			      <li class="nav-item active">
			        <a class="nav-link" href=" {{ route('liste-fournisseurs') }} ">FOURNISSEUR</a>
			      </li>
			 
			      <li class="nav-item active">
			        <a class="nav-link disabled" href=" {{ route('liste-categories') }} ">CATEGORIE</a>
			      </li>

			      <li class="nav-item active">
			        <a class="nav-link disabled" href="{{ route('liste-articles') }}">ARTICLE</a>
			      </li>

			      <li class="nav-item active">
			        <a class="nav-link disabled" href="{{ route('liste-users') }}">USERS</a>
			      </li>


					<li class="nav-item dropdown active">
	                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	                        <img src="/storage/{{auth()->user()->avatar}}" style="width: 30px; height: 30px; float: left; border-radius: 100%; margin-right: 5px;"><span class="caret"></span>
	                    </a>

	                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	                        <a class="dropdown-item" href="{{ route('deconnexion') }}"
	                           onclick="event.preventDefault();
	                                         document.getElementById('logout-form').submit();">
	                            {{ __('Déconnexion') }}
	                        </a>

	                        <form id="logout-form" action="{{ route('deconnexion') }}" style="display: none;">
	                            @csrf
	                        </form>

	                       
	                            <a class="dropdown-item" href="{{ route('mon-compte') }}"> Mon compte</a>
	                       
	                    </div>
	                </li>	
				@else
					<li class="nav-item active">
				        <a class="nav-link disabled" href="{{ route('login') }}">LOGIN</a>
				    </li>

				    <li class="nav-item active">
				        <a class="nav-link disabled" href="{{ route('add-users') }}">REGISTER</a>
				    </li>
				@endif
		    @endguest

		   
	       

	    </ul>
	    
	  </div>
</nav>