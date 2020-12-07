<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Education</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <link rel="manifest" href="site.webmanifest"> -->
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
	<!-- Place favicon.ico in the root directory -->

	<!-- CSS here -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/owl.carousel.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/magnific-popup.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/font-awesome.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/themify-icons.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/nice-select.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/flaticon.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/gijgo.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/animate.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/slicknav.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
	<!-- <link rel="stylesheet" href="css/responsive.css"> -->
	<style>
		.border {
			margin: 0 auto;
			border: 20px groove #ddd !important;
		}
	</style>
</head>

<body>
	<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

	<!-- header-start -->
	<?php echo $__env->make('fullcalendar.master.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<!-- header-end --> 
	<!-- bradcam_area_start  -->
	<div class="bradcam_area breadcam_bg">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="bradcam_text">
						<h3>controles : <?php echo e($controles->nomControle); ?></h3>
					</div>
				</div>
			</div>
		</div>
	</div> 
	<div class="event_details_area section__padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">

					<div class="event_details_info">
						<h2>Description :</h2>
						<p><?php echo e($controles->description); ?></p>
						 
					</div>
					<h2>Document</h2>
					<iframe src="<?php echo e(asset('assets/upload/controles/exam')); ?>/<?php echo e($controles->controle_PDF); ?>" style="width:100%; height:700px;" frameborder="0" allowfullscreen="allowfullscreen" kwframeid="1" controls controlsList="nodownload"></iframe>
					<div class="comment-form">
						<h4>Mon travail</h4>
						<form class="form-contact comment_form" action="<?php echo e(url('sendControle')); ?>" method="POST" id="commentForm" enctype="multipart/form-data">
							<?php echo csrf_field(); ?>
							<div class="row">
							  <div class="col-12">
								 <div class="form-group">
									<input class="form-control" name="PDF" id="PDF" type="file">
									<input type="hidden" name="id" value="<?php echo e($controles->id); ?>">
								 </div>
							  </div>
						   </div>
						   <div class="form-group">
							  <button type="submit" class="button button-contactForm btn_1 boxed-btn">Envoyer mon travail</button>
						   </div>
						</form>
					 </div>
				</div>
			</div>
			
		</div>
	</div>

	
	 
	<!-- footer start -->
	<footer class="footer">
		<div class="footer_top">
			<div class="container">
				<div class="newsLetter_wrap">
					<div class="row justify-content-between">
						<div class="col-md-7">
							<div class="footer_widget">
								<h3 class="footer_title">
									Stay Updated
								</h3>
								<form action="#" class="newsletter_form">
									<input type="text" placeholder="Email Address">
									<button type="submit">Subscribe Now</button>
								</form>
							</div>
						</div>
						<div class="col-md-12 col-lg-5">
							<div class="footer_widget">
								<h3 class="footer_title">
									Stay Updated
								</h3>
								<div class="socail_links">
									<ul>
										<li>
											<a href="#">
												<i class="ti-facebook"></i>
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-twitter"></i>
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-google-plus"></i>
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-linkedin"></i>
											</a>
										</li>
									</ul>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-3 col-md-6 col-lg-3">
						<div class="footer_widget">
							<h3 class="footer_title">
								About Us
							</h3>
							<ul>
								<li><a href="#">Online Learning</a></li>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Press Center</a></li>
								<li><a href="#">Become an Instructor</a></li>
							</ul>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 col-lg-3">
						<div class="footer_widget">
							<h3 class="footer_title">
								Campus
							</h3>
							<ul>
								<li><a href="#">Our Plans</a></li>
								<li><a href="#">Free Trial</a></li>
								<li><a href="#">Academic Solutions</a></li>
								<li><a href="#">Business Solutions</a></li>
								<li><a href="#">Government Solutions</a></li>
							</ul>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 col-lg-3">
						<div class="footer_widget">
							<h3 class="footer_title">
								Study
							</h3>
							<ul>
								<li><a href="#">Admissions Policy</a></li>
								<li><a href="#">Getting Started</a></li>
								<li><a href="#">Visa Information</a></li>
								<li><a href="#">Tuition Calculator</a></li>
								<li><a href="#">Request Information</a></li>
							</ul>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 col-lg-3">
						<div class="footer_widget">
							<h3 class="footer_title">
								Support
							</h3>
							<ul>
								<li><a href="#">Support</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">System Requirements</a></li>
								<li><a href="#">Register Activation Key</a></li>
								<li><a href="#">Site feedback</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="copy-right_text">
			<div class="container">
				<div class="footer_border"></div>
				<div class="row">
					<div class="col-xl-12">
						<p class="copy_right text-center">
							<p>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>
									document.write(new Date().getFullYear());
								</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</p>
						</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- footer end  -->


	<!-- JS here -->
	<script src="<?php echo e(asset('assets/js/vendor/modernizr-3.5.0.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/vendor/jquery-1.12.4.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/owl.carousel.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/isotope.pkgd.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/ajax-form.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/waypoints.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/jquery.counterup.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/imagesloaded.pkgd.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/scrollIt.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/jquery.scrollUp.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/wow.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/nice-select.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/jquery.slicknav.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/jquery.magnific-popup.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/plugins.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/gijgo.min.js')); ?>"></script>

	<!--contact-->
	<script src="<?php echo e(asset('assets/js/contact.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/jquery.ajaxchimp.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/jquery.form.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/jquery.validate.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/mail-script.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>

</body>

</html><?php /**PATH C:\Users\BADR\Desktop\FullCalendar-4.x-Laravel-6.x\resources\views/eleve/ControleMedia.blade.php ENDPATH**/ ?>