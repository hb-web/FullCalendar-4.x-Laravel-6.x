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
									<h4>Form Elements</h4>
								</div>
								<div class="widget-container">
									<div class=" widget-block">
										<div class="page-header">
											<h2>Form Heading</h2>
											<p>
												Quisque at mauris semper sapien varius scelerisque sed quis risus. Nulla
												rhoncus vel libero at aliquet. Duis id nibh non quam varius accumsan ut
												ac arcu.
											</p>
										</div>
										<form class="form-horizontal" method="POST" action="<?php echo e(route('addClass')); ?>">
											<?php echo csrf_field(); ?>
											<div class="form-group">
												<label class="col-md-4 control-label">Nom Examen</label>
												<div class=" col-md-8">
													<input type="text" class="form-control" name="nom" placeholder="Enter text">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 control-label">Niveau scolaire</label>
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
												<label class="col-md-4 control-label">Niveau Etude</label>
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
											<table id="tableClass" class="table table-hover table-bordered matmix-dt bg-hc-border display responsive nowrap"
												 >
												<thead>
													<tr>
														<th colspan="3">
															<div class="dt-col-header">
																All new registered users.
															</div>
															<p>
																This is a example of a complex header table
																you can use this syle in any kind of table.
															</p>
														</th>

													</tr>
													<tr>


														<th class="tc-center">
															Nom class
														</th>
														<th class="tc-center">
															Niveau étude
														</th>
														<th class="tc-center">
															Action
														</th>
													</tr>
                                                </thead>
                                                <?php $__currentLoopData = $class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tbody>
                                                        <tr>
                                                            <td class="tc-center"><b><?php echo e($clas->nomFiliere); ?></b></td> 
                                                            <td class="tc-center"><b><?php echo e($clas->nom_class); ?></b></td>
                                                            <td class="tc-center">
                                                                <a href="" class="btn btn-success">Modifier class</a> 
                                                                <a href="" class="btn btn-warning">Archiver</a>
                                                            </td>
                                                        </tr>
                                                        

                                                    </tbody>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												 
                                            </table>
                                            <?php echo e($class->links()); ?>

										</div>
									</div>
								</div>
							</div>


						</div>
						<div class="col-md-7">
							<div class="box-widget widget-module">
								<div class="widget-head clearfix">
									<span class="h-icon"><i class="fa fa-bars"></i></span>
									<h4>Form Elements With Addon</h4>
								</div>
								<div class="widget-container">
									<div class=" widget-block">

										<form class="form-horizontal" method="POST"
											action="<?php echo e(route('uploadCour')); ?>"
											enctype="multipart/form-data">
											<?php echo csrf_field(); ?>


											<div class="form-group">
												<label class="col-md-2 control-label">Examen :</label>
												<div class=" col-md-8">
													<select name="exam" id="exam" class="form-control" required>
														<option disabled="" selected="">Choisir Examen</option>
														 

													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Type Examen :</label>
												<div class=" col-md-8">

													<input type="text" name="typeExam" id="typeExam"
														class="form-control" readonly>
												</div>
											</div>
										<div style="display: none" id="display">
											<div class="form-group">
												<label class="col-md-2 control-label">Question :</label>
												<div class=" col-md-8">
													<textarea class="form-control" id="Question" name="Question"
														required aria-required="true"></textarea> </div>
											</div>


											<div class="form-group">
												<label class="col-md-2 control-label">Reponse 1 :</label>
												<div class=" col-md-8">

													<input type="R1" name="R1" id="typeExam"
														class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Reponse 2 :</label>
												<div class=" col-md-8">

													<input type="text" name="R2" id="R2"
														class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Reponse 3 :</label>
												<div class=" col-md-8">

													<input type="text" name="R3" id="R3"
														class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Reponse 4 :</label>
												<div class=" col-md-8">

													<input type="text" name="R4" id="R4"
														class="form-control">
												</div>
											</div>
										</div>
											<div class="form-group" style="display: none" id="DisplayPDF">
												<label class="col-md-2 control-label">PDF</label>
												<div class="col-md-8">
													<input type="file" id="PDF" name="PDF">
												</div>
											</div>
											 
											<div class="form-group">
												<label class="col-md-2 control-label">&nbsp;</label>
												<div class="col-md-8">
													<div class="form-actions">
														<button type="submit" class="btn btn-success">Ajouter</button>

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
														<th colspan="4">
															<div class="dt-col-header">
																All new registered users.
															</div>
															<p>
																This is a example of a complex header table
																you can use this syle in any kind of table.
															</p>
														</th>

													</tr>
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
                                                                    <a href="" class="btn btn-info">Modifier</a>
																</td>
																 
															</tr>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

													</tbody>
												
											</table>
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
	<?php echo $__env->make('layouts.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript">
		jQuery(function ($) {
			$('#tableClassProf').DataTable({
				"bPaginate": false,

			});
            $('#tableClass').DataTable({
				"bPaginate": false,

			});
		});
	</script>

	<script>
		$(document).ready(function () {

		 
		 


			$('#Niveau').change(function () {

				if ($(this).val() != '') {
					// var select = $(this).attr("id");
					// 
					var idNiveau = $(this).val();
					// var dependent = $(this).data('dependent');
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

		});
	</script>
</body>

 
</html><?php /**PATH C:\Users\BADR\Desktop\FullCalendar-4.x-Laravel-6.x\resources\views/admin/listCorectionExamen2.blade.php ENDPATH**/ ?>