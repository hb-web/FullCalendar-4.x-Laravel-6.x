<div class="left-aside desktop-view">
	<div class="aside-branding">
				<a href="index.html" class="iconic-logo">
					<img src="<?php echo e(asset('assets/images/logo-iconic.png')); ?>" alt="Matmix Logo"><strong>Ecole</strong>
				 </a>
				<a href="<?php echo e(url('index')); ?>" class="large-logo">
				</a><span class="aside-pin waves-effect"><i class="fa fa-thumb-tack"></i></span>
				<span class="aside-close waves-effect"><i class="fa fa-times"></i></span>
	</div>
	<div class="left-navigation">
				<ul class="list-accordion">

					
					<?php if(Session::has('idAdmin')): ?>
					<li><a class="waves-effect"><span class="nav-icon"><i class="fa fa-align-justify"></i></span><span class="nav-label">Gestion des Professeurs</span></a>
						<ul>
							<li><a href="<?php echo e(url('listProf')); ?>">List des professeurs</a></li>
							<li><a href="<?php echo e(url('AjouterProf')); ?>">Ajouter un Professeur</a></li>
							
						</ul>
					</li>
					<?php endif; ?>
					<li><a class="waves-effect"><span class="nav-icon"><i class="fa fa-align-justify"></i></span><span class="nav-label">Gestion des Etudiant</span></a>
						<ul>
							<li><a href="<?php echo e(url('listInscrivant')); ?>">List des nouveaux inscrivant</a></li>
							<li><a href="<?php echo e(url('listEtudiant')); ?>">List des Etudiant</a></li>
							<li><a href="<?php echo e(url('addEtudiant')); ?>">Ajouter un Etudiant</a></li>
							<li><a href="<?php echo e(url('ListArchiveEtudiant')); ?>">Archive les etudiant</a></li>
						</ul>
					</li>
					<li><a class="waves-effect"><span class="nav-icon"><i class="fa fa-align-justify"></i></span><span class="nav-label">Gestion des class</span></a>
						<ul>
							<?php if(Session::has('idprof')): ?>
								<li><a href="<?php echo e(url('listClass')); ?>">Mes class</a></li>
							<?php endif; ?>
							<?php if(Session::has('idAdmin')): ?> 
							<li><a href="<?php echo e(url('affectationProfClass')); ?>">Affectation Prof class</a></li>
								<li><a href="<?php echo e(url('listClass')); ?>">Class des prof</a></li>
							 	<li><a href="<?php echo e(url('AjouterClass')); ?>">Ajouter des class</a></li>
							<?php endif; ?>
						</ul>
					</li>
					<?php if(Session::has('idAdmin')): ?>
					<li><a class="waves-effect"><span class="nav-icon"><i class="fa fa-align-justify"></i></span><span class="nav-label">Gestion Matiere</span></a>
						<ul>
							<li><a href="<?php echo e(url('listMatiere')); ?>">List des matiere</a></li>
							<li><a href="<?php echo e(url('AjouterMatiere')); ?>">Ajouter une matiere</a></li>
							<li><a href="<?php echo e(url('archiveMatiere')); ?>">archive des matiere</a></li>
						</ul>
					</li>
					<?php endif; ?>
					<li><a class="waves-effect"><span class="nav-icon"><i class="fa fa-align-justify"></i></span><span class="nav-label">Gestion des cours</span></a>
						<ul>
							<li><a href="<?php echo e(url('listCours')); ?>">List des cours</a></li>
							<li><a href="<?php echo e(url('ajouterCours')); ?>">Ajouter mes cours</a></li>
							<li><a href="<?php echo e(url('les_Archives_Cours')); ?>">archive des cours</a></li>
						</ul>
					</li>
					<li><a class="waves-effect"><span class="nav-icon"><i class="fa fa-align-justify"></i></span><span class="nav-label">Gestion des Examens</span></a>
						<ul>
							<li><a href="<?php echo e(url('listExamens')); ?>">List des Examens</a></li>
							<li><a href="<?php echo e(url('AjouterExamens')); ?>">Ajouter mes Examen</a></li>
							<li><a href="<?php echo e(url('les_Archives_Examen')); ?>">archive des Examen</a></li>
						</ul>
					</li>
					

					<li><a class="waves-effect"><span class="nav-icon"><i class="fa fa-align-justify"></i></span><span class="nav-label">Gestion des controles</span></a>
						<ul>
							<li><a href="<?php echo e(url('listControles')); ?>">List des controles</a></li>
							<li><a href="<?php echo e(url('listReponseControles')); ?>">List des réponse controles</a></li>
							<li><a href="<?php echo e(url('addControle')); ?>">Ajouter controles</a></li>
							<li><a href="<?php echo e(url('archiveControle')); ?>">Archive des controles</a></li>
						</ul>
					</li>

					
				</ul>
	</div>
</div><?php /**PATH C:\Users\BADR\Desktop\FullCalendar-4.x-Laravel-6.x\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>