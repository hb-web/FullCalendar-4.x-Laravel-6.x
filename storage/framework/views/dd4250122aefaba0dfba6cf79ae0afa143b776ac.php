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
                                            Tables reponse des éleves
                                        </h2>
                                        <ul class="list-page-breadcrumb">
                                            <li><a href="#">Home</a></li>
                                            <li class="active-page">Tables reponse des éleves</li>
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
								<h2 style="text-align: center">Examen : <?php echo e($nom); ?></h2>
                                </div>
                                <div class="widget-container">
                                    <div class="widget-block">
                                         
											<div class="table-responsive">
											 
												<table
													class="table table-hover table-bordered matmix-dt bg-hc-border display responsive nowrap"
													id="tableClass" >
													<thead>
														<tr>
															<th colspan="10">
																<div class="dt-col-header">
																	Remarque :
																</div>
																<p>
																	Cliquer sur reponse éleves pour voir les reponse des éleve de ce goupe de class
																</p>
															</th>

														</tr>
														<tr>
															 
															<th class="tc-center">
																class
															</th>
															<th class="tc-center">
																Action
															</th>
														</tr>
													</thead>
													<tbody>
														<?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<tr>
																<td class="tc-center">
																	 
																	<label><b><?php echo e($class->nom_class); ?> </b></label>
																</td>
																
																
																<td class="tc-center">
																	<div class="btn-toolbar" role="toolbar">
																		<div class="btn-group" role="group">
																			<?php echo csrf_field(); ?>
																			
 																			<button type="button" name="update" id="<?php echo e($class->id); ?>" class="update btn btn-success btn-xs">Reponse éleves</button>
 
																		</div>
																	</div>
																</td>
															</tr>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

													</tbody>
												</table>
											
											</div>
											<div class="table-responsive" style="display: none">
												
												<table
													class="table table-hover table-bordered matmix-dt bg-hc-border display responsive nowrap"
													  id="tableEleve">
													<thead>
														<tr>	 
															<th class="tc-center">
																Etudiant
															</th>
															<th class="tc-center">
																Réponce Examen
															</th>
															<th class="tc-center">
																Action
															</th>
														</tr>
													</thead>
													<tbody id="eleve"></tbody>
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
			var table=$('#tableClass').DataTable({
				"bPaginate": false,
				"order": [[ 0, "desc" ]]

			});
			var table=$('#tableEleve').DataTable({
				"bPaginate": false,
				"order": [[ 0, "desc" ]]

			});
		
		 
			$(document).on('click', '.update', function(){  
           var id = $(this).attr("id"); 
		   
           $.ajax({    
				url:"<?php echo e(route('travailEtudiant')); ?>",
                method:"POST",  
                data:{
					"_token": "<?php echo e(csrf_token()); ?>",
					id:id},  
                dataType:"json",  
                success:function(data){ 
					var output = '';
							if(data.length > 0)
							{
								for(var count = 0; count < data.length; count++)
								{
								output += '<tr>';
								output += '<td class="tc-center sorting_1 dtr-control">'+data[count].name+" "+data[count].prenom+'</td>';
								output += '<td class="tc-center sorting_1 dtr-control"><a href="">'+data[count].travail_etudiant+'</a></td>';
								output += '<td class="tc-center"><div class="btn-toolbar" role="toolbar"><div class="btn-group" role="group"><a href="" class="btn btn-primary">voir</a></div></div></td>';
								output += '</tr>';
								}
							}else{
								console.log("pas etudiant");
								output += '<tr class="odd"><td valign="top" colspan="3" class="dataTables_empty">Pas etudiant dans cette class</td></tr>';
							}
							$('.table-responsive').show();
 							$('#eleve').html(output); 
                       
                }  
           })  
      }); 
		});
	</script>
	<script>
	 
			 
		  
	  
		 
		</script>

	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>


</body>

<!-- Mirrored from lab.westilian.com/matmix-admin/list-view/dashboard-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Apr 2017 21:18:01 GMT -->

</html><?php /**PATH C:\Users\BADR\Desktop\FullCalendar-4.x-Laravel-6.x\resources\views/admin/listClassNiveau.blade.php ENDPATH**/ ?>