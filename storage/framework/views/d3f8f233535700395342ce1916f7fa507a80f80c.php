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
                                            Tables list des étudiant  
                                        </h2>
                                        <ul class="list-page-breadcrumb">
										<li><a href="<?php echo e(url('/')); ?>">Accueil</a></li>
                                            <li class="active-page"> Tables list des étudiant </li>
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
									<h4><strong> Tables list des étudiant</strong></h4>
                                </div>
                                <div class="widget-container">
                                    <div class="widget-block">
											<div class="table-responsive">
												<table class="table table-hover table-bordered matmix-dt bg-hc-border display responsive nowrap" id="tableEleve" >
													<thead>
														<tr>
															<th colspan="10">
																	<div class="row">
																		<div class="col-6" >
																			<label >Niveau Etude :</label>
																			<?php echo csrf_field(); ?>
																			<select name="niveauEtude" id="niveauEtude" class="form-control" required>
																				<option disabled="" selected="">Niveau</option>
																				<?php $__currentLoopData = $FiliereClass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $FC): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																				  <option value="<?php echo e($FC->id); ?>"><?php echo e($FC->nomFiliere); ?></option>
																				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																			</select>
																		</div>
																		<div class="col-6" >
																			<label >Class :</label>
																			<select name="class" id="class" class="form-control" required></select>
																		</div>
																	</div>
															</th>
														</tr>
														<tr>
															<th class="tc-center">
																id
															</th>
															<th class="tc-center">
																Nom complet
															</th>
															<th class="tc-center">
																Email
															</th>
															<th class="tc-center">
																téléphone
															</th>
															<th class="tc-center">
																Filiére
															</th>
															<th class="tc-center">
																Class
															</th>
															 
															<th class="tc-center">
																Action
															</th>
														</tr>
													</thead>
													<tbody id="tbodyEleve">
														<?php $__currentLoopData = $eleves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eleve): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<tr>
																<td class="tc-center">
																	 
																	<label><b><?php echo e($eleve->id); ?> </b></label>
																</td>
																<td class="tc-center">
																	 
																	<label><b><?php echo e($eleve->name); ?> <?php echo e($eleve->prenom); ?> </b></label>
																</td>
																<td class="tc-center">
																	 
																	<label><b><?php echo e($eleve->email); ?> </b></label>
																</td>
																<td class="tc-center">
																	 
																	<label><b><?php echo e($eleve->télé); ?></b></label>
																</td>
																<td class="tc-center">
																	 
																	<label><b><?php echo e($eleve->nomFiliere); ?></b></label>
																</td>
																<td class="tc-center">
																	 
																	<label><b><?php echo e($eleve->nom_class); ?></b></label>
																</td>
																<td class="tc-center">
																	<div class="btn-toolbar" role="toolbar">
																		<div class="btn-group" role="group">
																			<?php echo csrf_field(); ?> 
																			<a href="<?php echo e(action('EtudiantController@ModifierEtudiant',$eleve->id)); ?>" class="btn btn-primary">Modifier</a>
 																			<a href="<?php echo e(action('EtudiantController@archiveEtudiant',$eleve->id)); ?>" class="btn btn-info">Archiver</a>
																		</div>
																	</div>
																</td>
															</tr>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

													</tbody>
												</table>
											<?php echo e($eleves->links()); ?>

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
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>  
	<script type="text/javascript">
        jQuery(function($) {
          $(document).ready(function(){ 
            var dt=$('#tableEleve').DataTable({
                "bPaginate" : false,
				"order": [[ 0, "desc" ]]	 

              });
			  dt.columns([0]).visible(false);
           });
        });
    </script> 
	<script type="text/javascript">
		jQuery(function($) {
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
		  $('#class').change(function () {
			if ($(this).val() != '') {
			  var idclass = $(this).val();
			  var _token = $('input[name="_token"]').val();
			   
			  $.ajax({
				url: "<?php echo e(route('tableEtudiant')); ?>",
				method: "POST",
				data: {
					idclass: idclass,
					"_token": "<?php echo e(csrf_token()); ?>"
				},
				success: function (result) {
				  $("#tbodyEleve").html(result);
				  $('.pagination').hide();
				}
			  })
			}
			});



		});
	  </script>
		
</body>

</html><?php /**PATH C:\Users\hb\Desktop\Ecole-formation\resources\views/admin/listEtudiant.blade.php ENDPATH**/ ?>