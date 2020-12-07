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
                    <h4><strong> Formulaire Modifier Étudiant</strong></h4>
                  </div>
                  <div class="widget-container">
                    <div class=" widget-block">
                      
                      <form class="form-horizontal" method="POST"
                        action="<?php echo e(route('updateEtudiant', [$users->id])); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Nom Etudiant :</label>
                          <div class=" col-md-8">
                             

                          <input type="text" class="form-control" name="nom" id="nom" value="<?php echo e($users->name); ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-2 control-label">Prénom Etudiant :</label>
                          <div class=" col-md-8">
                            <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo e($users->prenom); ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-2 control-label">Email :</label>
                          <div class=" col-md-8">
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo e($users->email); ?>" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Téléphone :</label>
                          <div class=" col-md-8">
                            <input type="text" class="form-control" name="tel" id="tel" value="<?php echo e($users->télé); ?>" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Niveau Étude :</label>
                          <div class=" col-md-8">
                            <select name="niveauEtude" id="niveauEtude" class="form-control" required>
                              <?php if($users->filiere==""): ?>
                                <option value="">Cet étudiant n'a pas de niveau étude veuillez l'affecter</option>
                                <?php $__currentLoopData = $FiliereClass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $FC): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($FC->id); ?>"><?php echo e($FC->nomFiliere); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php else: ?>
                               <?php $__currentLoopData = $FiliereClass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $FC): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($FC->id==$users->filiere): ?>
                                  <option value="<?php echo e($FC->id); ?>" selected><?php echo e($FC->nomFiliere); ?></option>
                                <?php else: ?>
                                  <option value="<?php echo e($FC->id); ?>"><?php echo e($FC->nomFiliere); ?></option>
                                <?php endif; ?>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Class :</label>
                          <div class=" col-md-8">
                            <select name="class" id="class" class="form-control" required>
                             
                            <?php if($users->id_class==""): ?>
                              <option value="">Cet étudiant n'a pas de class veuillez l'affecter</option>
                              <?php $__currentLoopData = $Class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $C): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($C->id); ?>" ><?php echo e($C->nom_class); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                             <?php $__currentLoopData = $Class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $C): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($users->id_class==$C->id): ?>
                                <option value="<?php echo e($C->id); ?>" selected><?php echo e($C->nom_class); ?></option>
                              <?php else: ?>
                                <option value="<?php echo e($C->id); ?>" ><?php echo e($C->nom_class); ?></option>
                              <?php endif; ?>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            </select>
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
  <script>
    $(document).ready(function () {
       
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
</html><?php /**PATH C:\Users\BADR\Desktop\FullCalendar-4.x-Laravel-6.x\resources\views/admin/updateEtudiant.blade.php ENDPATH**/ ?>