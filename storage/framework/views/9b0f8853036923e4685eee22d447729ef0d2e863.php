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
            <br>
            <div class="row">
              <div class="col-md-12">
                <div class="box-widget widget-module">
                  <div class="widget-head clearfix">
                    <span class="h-icon"><i class="fa fa-bars"></i></span>
                    <h4><strong> Nouveau Professeur</strong></h4>
                  </div>
                  <div class="widget-container">
                    <div class=" widget-block">
                      <div class="page-header">
                        <h2>Ajouter Nouveau Professeur</h2>
					  </div>
					  <h3 style="text-align: center"><label class="label label-info">Remarque le mot de pass du compte Professeur c'est leur CIN  </label></h3>
						
					   <form class="form-horizontal" method="POST"
							action="<?php echo e(route('addProf')); ?>" enctype="multipart/form-data">
							<?php echo csrf_field(); ?>

							<?php if($errors->any()): ?>
								<div class="alert alert-danger">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<?php echo e($errors->first()); ?>

								</div>
							<?php endif; ?>
							<div class="form-group">
								<label class="col-md-2 control-label">CIN :</label>
								<div class=" col-md-8">
									<input type="text" class="form-control" name="cin" id="cin" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Nom professeur :</label>
								<div class=" col-md-8">
									<input type="text" class="form-control" name="nom" id="nom" required>
								</div>
							</div>

							<div class="form-group">
							<label class="col-md-2 control-label">Prénom professeur :</label>
							<div class=" col-md-8">
								<input type="text" class="form-control" name="prenom" id="prenom" required>
							</div>
							</div>

							<div class="form-group">
							<label class="col-md-2 control-label">Téléphone :</label>
							<div class=" col-md-8">
								<input type="text" class="form-control" name="tel" id="tel" required>
							</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Email :</label>
								<div class=" col-md-8">
								<input type="text" class="form-control" name="email" id="email" required>
								</div>
							</div>
							<div class="form-group">
							<label class="col-md-2 control-label">Matiére :</label>
							<div class=" col-md-8">
								<select name="matiere" id="matiere" class="form-control" required>
								<option disabled="" selected="" value="">Matiére</option>
								<?php $__currentLoopData = $matieres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($m->id); ?>"><?php echo e($m->nomMatiere); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
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
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
</body>

<!-- Mirrored from lab.westilian.com/matmix-admin/list-view/dashboard-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Apr 2017 21:18:01 GMT -->

</html><?php /**PATH C:\Users\hb\Desktop\Ecole-formation\resources\views/admin/addProf.blade.php ENDPATH**/ ?>