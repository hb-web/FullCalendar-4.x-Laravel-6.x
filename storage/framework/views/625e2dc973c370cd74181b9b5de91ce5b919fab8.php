<!doctype html>
<html>

<!-- Mirrored from lab.westilian.com/matmix-admin/list-view/dashboard-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Apr 2017 21:18:01 GMT -->

<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
	<div class="bb-alert alert alert-success noty_animated fadeInUp">
		<span>Table Callback Demo Content</span>
	</div>
	<div class="page-container list-menu-view">
		<!--Leftbar Start Here -->

		<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="http://malsup.github.com/jquery.form.js"></script>
		<div class="page-content">
			<!--Topbar Start Here -->
			<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<div class="main-container">
				<div class="container-fluid">
					<div class="page-breadcrumb">
						<div class="row">
							<div class="col-md-7">
								<div class="page-breadcrumb-wrap">

									<div class="page-breadcrumb-info">
										<h2 class="breadcrumb-titles">Basic Forms <small>All basic forms
												elements</small></h2>
										<ul class="list-page-breadcrumb">
											<li><a href="#">Home</a>
											</li>
											<li class="active-page"> Forms</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-5">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<div class="box-widget widget-module">
								<div class="widget-head clearfix">
									<span class="h-icon"><i class="fa fa-bars"></i></span>
									<h3> Ajouter une nouvelle class</h3>
								</div>
								<div class="widget-container">
									<div class=" widget-block">
										<form class="form-horizontal" method="POST" action="<?php echo e(route('classProf')); ?>">
											<?php echo csrf_field(); ?>
											<div class="form-group">
												<label class="col-md-4 control-label">Nom Class : </label>
												<div class=" col-md-8">
													<input type="text" class="form-control" name="name" placeholder="Enter text">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 control-label">Niveau scolaire : </label>
												<div class=" col-md-8">
													<select name="Niveau" id="Niveau" class="form-control" required>
                                                        <option disabled="" selected="">Choisir Niveau</option>
                                                        <?php $__currentLoopData = $niveau; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $N): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($N->id); ?>"><?php echo e($N->nomNiveauScol); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 control-label">Niveau Étude : </label>
												<div class=" col-md-8">
													<select name="filiere" id="filiere" class="form-control" required></select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-4 control-label">&nbsp;</label>
												<div class="col-md-8">
													<div class="form-actions">
														<button type="submit" class="btn btn-success">Ajouter</button>
													</div>
												</div>
											</div>
										</form>

										<div class="table-responsive">
											<table id="tableClass" class="table table-hover table-bordered matmix-dt bg-hc-border display responsive nowrap">
												<thead>						 
													<tr>
														<th class="tc-center">
															Niveau étude
														</th>

														<th class="tc-center">
															Nom class
														</th>
														<th class="tc-center">
															Action
														</th>
													</tr>
                                                </thead>
                                                <?php $__currentLoopData = $filieres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filiere): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tbody>
                                                        <tr>
                                                            <td class="tc-center"><b><?php echo e($filiere->nomFiliere); ?></b></td> 
                                                            <td class="tc-center"><b><?php echo e($filiere->nom_class); ?></b></td>
                                                            <td class="tc-center">
                                                                <a href="<?php echo e(action('ClassController@UpdateClass',$filiere->id)); ?>" class="btn btn-primary">Modifier class</a> 
                                                                
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												 
                                            </table>
                                            <?php echo e($filieres->links()); ?>

										</div>
									</div>
								</div>
							</div>


						</div>
						<div class="col-md-7">
							<div class="box-widget widget-module">
								<div class="widget-head clearfix">
									<span class="h-icon"><i class="fa fa-bars"></i></span>
									<h3> Affecter un prof à leur class</h3>
								</div>
								<div class="widget-container">
									<div class=" widget-block">

										<form class="form-horizontal" method="POST" action="<?php echo e(route('affectProfClass')); ?>"	enctype="multipart/form-data">
											<?php echo csrf_field(); ?>
											<div class="form-group">
												<label class="col-md-2 control-label">Niveau Étude :</label>
												<div class=" col-md-8">
													<select name="niveauEtude" id="niveauEtude" class="form-control" required>
															<option disabled="" selected="">Niveau</option>
														<?php $__currentLoopData = $FiliereClass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $FC): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($FC->id); ?>"><?php echo e($FC->nomFiliere); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Class :</label>
												<div class=" col-md-8">
													<select name="class" id="class" class="form-control" required></select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Professeur :</label>
												<div class=" col-md-8">
													<select name="Professeur" id="Professeur" class="form-control" required>
															<option disabled="" selected="">Choisir</option>
														<?php $__currentLoopData = $prof; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $P): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($P->id); ?>"><?php echo e($P->name); ?> <?php echo e($P->prenom); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">&nbsp;</label>
												<div class="col-md-8">
													<div class="form-actions">
														<input type="submit" class="btn btn-success" value="Ajouter">
													</div>
												</div>
											</div>
										</form>
										<div class="table-responsive">
											<table
												class="table table-hover table-bordered matmix-dt bg-hc-border display responsive nowrap"
												id="tableClassProf">
												<thead>													 
													<tr>
														<th class="tc-center">
															Nom class
														</th>
														<th class="tc-center">
															Proffesseur
														</th>
														<th class="tc-center">
															Matiére
                                                        </th>
                                                        <th class="tc-center">
															Action
														</th>
													</tr>
                                                </thead> 
                                                    <tbody>
														<?php $__currentLoopData = $classProf; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<tr>
																<td class="tc-center">
                                                                	<label><b><?php echo e($cl->nom_class); ?></b></label>
																</td>
																<td class="tc-center">
																	<label><b><?php echo e($cl->name); ?> <?php echo e($cl->prenom); ?></b></label>
                                                                </td>
                                                                <td class="tc-center">
																	<label><b><?php echo e($cl->nomMatiere); ?></b></label>
																</td>
                                                                <td class="tc-center">
                                                                    <a href="<?php echo e(action('LignClassProf@ModifierControle',$cl->id)); ?>" class="btn btn-primary">Modifier</a>
																</td>
															</tr>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

													</tbody>
											</table>
												<?php echo e($classProf->links()); ?>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--Footer Start Here -->
			<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
	</div>
	<!--Rightbar Start Here -->
	<?php echo $__env->make('layouts.rightBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('layouts.scriptDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script> 
	<script type="text/javascript">
		jQuery(function ($) {
			$('#tableClassProf').DataTable({
				"bPaginate": false,
				columnDefs: [
				{   "targets": [0]
				}
				]
			});
            
		});
	</script>

	<script>
		$(document).ready(function () {
			$('#Niveau').change(function () {
				if ($(this).val() != '') {
					var idNiveau = $(this).val();
					var _token = $('input[name="_token"]').val();
					$.ajax({
						url: "<?php echo e(route('filiere')); ?>",
						method: "POST",
						data: {
							idNiveau: idNiveau,
							_token: _token
						},
						success: function (result) {
							$("#filiere").html(result);
						}
					})
				}
			});


			$('#niveauEtude').change(function () {
				if ($(this).val() != '') {
					var niveauEtude = $(this).val();
					var _token = $('input[name="_token"]').val();
					$.ajax({
						url: "<?php echo e(route('filiere')); ?>",
						method: "POST",
						data: {
							niveauEtude: niveauEtude,
							_token: _token
						},
						success: function (result) {
							$("#class").html(result);
						}
					})
				}
			});

		});
	</script>
</body>

 
</html><?php /**PATH C:\Users\BADR\Desktop\FullCalendar-4.x-Laravel-6.x\resources\views/admin/affectationProfClass.blade.php ENDPATH**/ ?>