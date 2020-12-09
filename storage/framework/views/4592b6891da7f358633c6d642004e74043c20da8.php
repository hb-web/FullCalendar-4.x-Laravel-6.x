<!doctype html>
<html>

<!-- Mirrored from lab.westilian.com/matmix-admin/list-view/dashboard-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Apr 2017 21:18:01 GMT -->

<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
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
										<h2 class="breadcrumb-titles">Calendrier class : <?php echo e($classe); ?> <?php if(Session::has('idAdmin')): ?>du professeur : <?php echo e($prof->name); ?> <?php echo e($prof->prenom); ?> <?php endif; ?> </u></h2>
										<ul class="list-page-breadcrumb">
											<li><a href="#">Home</a>
											</li>
											<li class="active-page"> Dashboard</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-5">
							</div>
						</div>
					</div>
					<?php echo $__env->make('layouts.calendrierClass', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				</div>
			</div>
			<!--Footer Start Here -->
			<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		</div>
	</div>
	<!--Rightbar Start Here -->
	<?php echo $__env->make('layouts.rightBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('layouts.scriptDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<script src="<?php echo e(asset('assets/fullcalendarNPM/js/fullcalendar.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/fullcalendarNPM/js/jquery-and-mask-and-moment.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/fullcalendarNPM/js/bootstrap.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/fullcalendarNPM/js/scriptCalendar.js')); ?>"></script>
	
	<script>
		$(document).ready(function(){
			$("#type").change(function(){
			if($("#type").val()=='document')
			{
				$("#salles").hide();
				$("#cours").show();
   			}else{
				$("#salles").show();
				$("#cours").hide();
   			}
			
			});

			
		});

		
	</script>




</body>

<!-- Mirrored from lab.westilian.com/matmix-admin/list-view/dashboard-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Apr 2017 21:18:01 GMT -->

</html><?php /**PATH C:\Users\hb\Desktop\FullCalendar-4.x-Laravel-6.x\resources\views/admin/emploiTempClass.blade.php ENDPATH**/ ?>