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
					<div class="col-md-12">
						<div class="box-widget widget-module">
							<div class="widget-head clearfix">
								<span class="h-icon"><i class="fa fa-bars"></i></span>
								<h4>Form Elements</h4>
							</div>
							<div class="widget-container">
								<div class=" widget-block">
									<div class="page-header">
										<h2>Modifier Examen</h2>
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%
											</div>
										</div>
										
									<br />
									</div>
									<form class="form-horizontal" method="POST" action="<?php echo e(route('ModifierExam')); ?>" enctype="multipart/form-data">
										<?php echo csrf_field(); ?>
										<div class="form-group">
 											<label class="col-md-2 control-label">Nom Examen :</label>
											<div class=" col-md-8">
												<input type="text" class="form-control" name="nomExam" id="nomExam" value="<?php echo e($Examen->nom_exam); ?>" required>
                      <input type="hidden" name="id" value="<?php echo e($id); ?>">
                      </div>
										</div>
										<div class="form-group">
 											<label class="col-md-2 control-label">Description :</label>
											<div class=" col-md-8">
                      <textarea class="form-control" id="description" name="description" required aria-required="true"><?php echo e($Examen->description_exam); ?></textarea>											</div>

                    </div>
										
										 
										<div class="form-group">
											<label class="col-md-2 control-label">PDF examen</label>
											<div class="col-md-6">
												<input type="file" id="PDF" name="PDF" >
                      </div>
                      <label class="control-label"><?php echo e($Examen->file_exam); ?></label>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Solution Examen</label>
											<div class="col-md-6">
												<input type="file" id="solution" name="solution">
                      </div>
                      <label class="control-label"><?php echo e($Examen->file_exam); ?></label>
										</div>
										
										<div class="form-group">
 											<div class="col-md-8">
											  
												<input type="submit" name="upload" value="Modifier" class="btn btn-success" ><div id="success"></div>
											
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
    <?php echo $__env->make('layouts.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script type="text/javascript">
  jQuery(function($) {
    $('#tableMatiere').DataTable( {
        "bPaginate": false,
        
    } );
  });
</script>

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>

<script>
$(document).ready(function(){

    $('form').ajaxForm({
      beforeSend:function(){
        $('#success').empty();
      },
      uploadProgress:function(event, position, total, percentComplete)
      {
        $('.progress-bar').text(percentComplete + '%');
        $('.progress-bar').css('width', percentComplete + '%');
      },
      success:function(data)
      {
        if(data.errors)
        {
          $('.progress-bar').text('0%');
          $('.progress-bar').css('width', '0%');
          $('#success').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
        }
        if(data.success)
        {
          $('.progress-bar').text('Téléchargé');
          $('.progress-bar').css('width', '100%');
          $('#success').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');
          window.location.href = "listExamens";
        }
      }
    });

});
</script>
</body>

<!-- Mirrored from lab.westilian.com/matmix-admin/list-view/dashboard-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Apr 2017 21:18:01 GMT -->

</html><?php /**PATH C:\Users\BADR\Desktop\FullCalendar-4.x-Laravel-6.x\resources\views/admin/updateExamen.blade.php ENDPATH**/ ?>