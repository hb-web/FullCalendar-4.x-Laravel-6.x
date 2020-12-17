<!doctype html>
<html>
<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
	<div class="bb-alert alert alert-success noty_animated fadeInUp">
		<span>Tables list des Professeurs</span>
	</div>
	<div class="page-container list-menu-view">
		<!--Leftbar Start Here -->

		<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                        <h2 class="breadcrumb-titles">
                                            Tables list des Professeurs

                                        </h2>
                                        <ul class="list-page-breadcrumb">
                                            <li><a href="#">Home</a></li>
                                            <li class="active-page">list des Professeurs</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-widget widget-module">
                                <div class="widget-head clearfix">
                                    <span class="h-icon"><i class="fa fa-table"></i></span>
                                    <h4><strong> Complex Header Example</strong></h4>
                                </div>
                                <div class="widget-container">
                                    <div class="widget-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                            <a href="<?php echo e(url('AjouterProf')); ?>" class="btn btn-success">Ajouter Professeur</a>
                                            </div>
                                        </div>
                                        <br> 
										 
											<div class="table-responsive">
												<table
													class="table table-hover table-bordered matmix-dt bg-hc-border display responsive nowrap"
													id="tableProf">
													<thead>
														 
														<tr>
															<th class="tc-center">
																Nom complet
															</th>
															<th class="tc-center">
																Téléphone
															</th>
															<th class="tc-center">
																Email
															</th>
															<th class="tc-center">
																Matière
															</th>
															<th class="tc-center">
																Action
															</th>
														</tr>
													</thead>
													<tbody>
														<?php $__currentLoopData = $profs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prof): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<tr>
																
																<td class="tc-center">
																	<label><b><?php echo e($prof->name); ?> <?php echo e($prof->prenom); ?></b></label>
																</td>
																<td class="tc-center">
																	<label><b><?php echo e($prof->télé); ?></b></label>
																</td>
																<td class="tc-center">
																	<label><b><?php echo e($prof->email); ?></b></label>
																</td>
																 <td class="tc-center">
																	<label><b><?php echo e($prof->nomMatiere); ?></b></label>
																</td>
																 
																<td class="tc-center">
																	<div class="btn-toolbar" role="toolbar">
																		<div class="btn-group" role="group">
 																			<a href="" class="btn btn-primary">Modifier</a>															 
																			 <a href="" class="btn btn-info">Archiver</a>															 

																		</div>
																	</div>
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
			</div>
			<!--Footer Start Here -->
			<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
	</div>
	<!--Rightbar Start Here -->
	<?php echo $__env->make('layouts.rightBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('layouts.scriptDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<script type="text/javascript">
		jQuery(function ($) {
			$('#tableProf').DataTable({
				"bPaginate": false,
				"order": [[ 0, "desc" ]]

			});
		});
	</script>

	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>


</body>

</html><?php /**PATH C:\Users\hb\Desktop\Ecole-formation\resources\views/admin/listProf.blade.php ENDPATH**/ ?>