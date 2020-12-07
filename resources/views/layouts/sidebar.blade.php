<div class="left-aside desktop-view">
	<div class="aside-branding">
				<a href="index.html" class="iconic-logo">
					<img src="{{asset('assets/images/logo-iconic.png')}}" alt="Matmix Logo"><strong>Ecole</strong>
				 </a>
				<a href="{{ url('index')}}" class="large-logo">
				</a><span class="aside-pin waves-effect"><i class="fa fa-thumb-tack"></i></span>
				<span class="aside-close waves-effect"><i class="fa fa-times"></i></span>
	</div>
	<div class="left-navigation">
				<ul class="list-accordion">

					{{-- <li><a class="waves-effect"><span class="nav-icon"><i class="fa fa-align-justify"></i></span><span class="nav-label">Gestion programme</span></a>
						<ul>
							<li><a href="#">Emplois</a></li>
						</ul>
					</li> --}}
					@if(Session::has('idAdmin'))
					<li><a class="waves-effect"><span class="nav-icon"><i class="fa fa-align-justify"></i></span><span class="nav-label">Gestion des Professeurs</span></a>
						<ul>
							<li><a href="{{url('listProf')}}">List des professeurs</a></li>
							<li><a href="{{url('AjouterProf')}}">Ajouter un Professeur</a></li>
							{{-- <li><a href="{{url('ListArchiveEtudiant')}}">Archive les etudiant</a></li> --}}
						</ul>
					</li>
					@endif
					<li><a class="waves-effect"><span class="nav-icon"><i class="fa fa-align-justify"></i></span><span class="nav-label">Gestion des Etudiant</span></a>
						<ul>
							<li><a href="{{url('listInscrivant')}}">List des nouveaux inscrivant</a></li>
							<li><a href="{{url('listEtudiant')}}">List des Etudiant</a></li>
							<li><a href="{{url('addEtudiant')}}">Ajouter un Etudiant</a></li>
							<li><a href="{{url('ListArchiveEtudiant')}}">Archive les etudiant</a></li>
						</ul>
					</li>
					<li><a class="waves-effect"><span class="nav-icon"><i class="fa fa-align-justify"></i></span><span class="nav-label">Gestion des class</span></a>
						<ul>
							@if(Session::has('idprof'))
								<li><a href="{{url('listClass')}}">Mes class</a></li>
							@endif
							@if(Session::has('idAdmin')) 
							<li><a href="{{url('affectationProfClass')}}">Affectation Prof class</a></li>
								<li><a href="{{url('listClass')}}">Class des prof</a></li>
							 	<li><a href="{{url('AjouterClass')}}">Ajouter des class</a></li>
							@endif
						</ul>
					</li>
					@if(Session::has('idAdmin'))
					<li><a class="waves-effect"><span class="nav-icon"><i class="fa fa-align-justify"></i></span><span class="nav-label">Gestion Matiere</span></a>
						<ul>
							<li><a href="{{url('listMatiere')}}">List des matiere</a></li>
							<li><a href="{{url('AjouterMatiere')}}">Ajouter une matiere</a></li>
							<li><a href="{{url('archiveMatiere')}}">archive des matiere</a></li>
						</ul>
					</li>
					@endif
					<li><a class="waves-effect"><span class="nav-icon"><i class="fa fa-align-justify"></i></span><span class="nav-label">Gestion des cours</span></a>
						<ul>
							<li><a href="{{url('listCours')}}">List des cours</a></li>
							<li><a href="{{url('ajouterCours')}}">Ajouter mes cours</a></li>
							<li><a href="{{url('les_Archives_Cours')}}">archive des cours</a></li>
						</ul>
					</li>
					<li><a class="waves-effect"><span class="nav-icon"><i class="fa fa-align-justify"></i></span><span class="nav-label">Gestion des Examens</span></a>
						<ul>
							<li><a href="{{url('listExamens')}}">List des Examens</a></li>
							<li><a href="{{url('AjouterExamens')}}">Ajouter mes Examen</a></li>
							<li><a href="{{url('les_Archives_Examen')}}">archive des Examen</a></li>
						</ul>
					</li>
					{{-- @if(Session::has('idprof')) --}}

					<li><a class="waves-effect"><span class="nav-icon"><i class="fa fa-align-justify"></i></span><span class="nav-label">Gestion des controles</span></a>
						<ul>
							<li><a href="{{url('listControles')}}">List des controles</a></li>
							<li><a href="{{url('listReponseControles')}}">List des réponse controles</a></li>
							<li><a href="{{url('addControle')}}">Ajouter controles</a></li>
							<li><a href="{{url('archiveControle')}}">Archive des controles</a></li>
						</ul>
					</li>

					{{-- @endif --}}
				</ul>
	</div>
</div>