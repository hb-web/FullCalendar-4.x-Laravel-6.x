<!doctype html>
<html>
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
                          <h2 class="breadcrumb-titles">
                            Modifier Étudiant  
                          </h2>
                          <ul class="list-page-breadcrumb">
                            <li><a href="<?php echo e(url('/')); ?>">Accueil</a></li>
                              <li class="active-page">Modifier Étudiant</li>
                          </ul>
                      </div>
                  </div>
              </div>
            </div>  
          </div>
            <div class="row">
              <div class="col-md-12">
                <div class="box-widget widget-module">
                  <div class="widget-head clearfix">
                    <span class="h-icon"><i class="fa fa-bars"></i></span>
                    <h4><strong> Modifier Nom class </strong></h4>
                  </div>
                  <div class="widget-container">
                    <div class=" widget-block">
                      
                      <form class="form-horizontal" method="POST"
                        action="<?php echo e(route('ModifierNomClass')); ?>" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>
						<div class="form-group">
							<label class="col-md-2 control-label">Filiére :</label>
							<div class=" col-md-8">
								<input type="hidden" value="<?php echo e($class->id); ?>" name='id'>
								<select name="filiere" id="filiere" class="form-control" required>
									<?php $__currentLoopData = $filieres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filiere): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($class->filiere==$filiere->id): ?>
											<option value="<?php echo e($filiere->id); ?>" selected><?php echo e($filiere->nomFiliere); ?></option>
										<?php else: ?>
										<option value="<?php echo e($filiere->id); ?>"><?php echo e($filiere->nomFiliere); ?></option>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									
								</select>
							</div>
						  </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Nom Class :</label>
                          <div class=" col-md-8">
                           
                          <input type="text" class="form-control" name="nom" id="nom" value="<?php echo e($class->nom_class); ?>" required>
                          </div>
                        </div>
                        
                        
                        <div class="form-group">
                          <label class="col-md-2 control-label">&nbsp;</label>
                          <div class="col-md-8">
                            <div class="form-actions">
                              <button type="submit" class="btn btn-primary">Modifier</button>
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
      <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
  <?php echo $__env->make('layouts.rightBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('layouts.scriptDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
</body>
</html><?php /**PATH C:\Users\BADR\Desktop\FullCalendar-4.x-Laravel-6.x\resources\views/admin/UpdateClass.blade.php ENDPATH**/ ?>