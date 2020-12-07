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
                                            Tables <small>A different styled complex table</small>
                                        </h2>
                                        <ul class="list-page-breadcrumb">
                                            <li><a href="#">Home</a></li>
                                            <li class="active-page">Tables</li>
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
                                    <h4>A Complex Header Example</h4>
                                </div>
                                <div class="widget-container">
                                    <div class="widget-block">
                                      										 
											<div class="table-responsive">
												<table
													class="table table-hover table-bordered matmix-dt bg-hc-border display responsive nowrap"
													id="tableMatiere">
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
																Niveau étude
															</th>
															<th class="tc-center">
																Class
															</th>
															<?php if(Session::has('idAdmin')): ?>
															<th class="tc-center">
																Professeur
															</th>
															<?php endif; ?>
															<th class="tc-center">
																Action
															</th>
														</tr>
													</thead>
													<tbody>
														<?php $__currentLoopData = $class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<tr>
																
																<td class="tc-center">
																	<label><b><?php echo e($cl->nomFiliere); ?></b></label>
																</td>
																<td class="tc-center">
																	<label><b><?php echo e($cl->nom_class); ?></b></label>
																</td>
																<?php if(Session::has('idAdmin')): ?>
																	<td class="tc-center">
																		<label><b><?php echo e($cl->name); ?> <?php echo e($cl->prenom); ?></b></label>
																	</td>
																<?php endif; ?>
																<td class="tc-center">
																	<div class="btn-toolbar" role="toolbar">
																		<div class="btn-group" role="group">
 																			<a href="<?php echo e(action('ClassController@listLive',[$cl->nom_class, $cl->class])); ?>" class="btn btn-primary">Présence live</a>															 
																			 <a href="<?php echo e(action('EventController@mycalender',[$cl->nom_class, $cl->idClass])); ?>" class="btn btn-info">Calendrier</a>															 

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
			$('#tableMatiere').DataTable({
				"bPaginate": false,
				"order": [[ 0, "desc" ]]

			});
		});
	</script>

	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>


</body>

<!-- Mirrored from lab.westilian.com/matmix-admin/list-view/dashboard-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Apr 2017 21:18:01 GMT -->

</html><?php /**PATH C:\Users\BADR\Desktop\FullCalendar-4.x-Laravel-6.x\resources\views/admin/listClass.blade.php ENDPATH**/ ?>