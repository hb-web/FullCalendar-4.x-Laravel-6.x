
<!doctype html>
<html class="no-js" >

    <?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Education</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/img/favicon.png')); ?>">
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

<body>

    <!-- header-start -->
    <?php echo $__env->make('fullcalendar.master.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
    

    <!-- service_area_start  -->
    
       

    <div class="row">
        <div class="col-md-3">
           <div class="service_area gray_bg">
                <div class="container">
                    <div class="row justify-content-center ">
                        
                            <div class="col-lg-10" id="single-cours">
                                <a href="<?php echo e(url('mes_cours')); ?>">
                                    <div class="single_service d-flex align-items-center ">
                                        <div class="icon">
                                            <i class="flaticon-school"></i>
                                        </div>
                                        <div class="service_info">
                                            <h4>Cours</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        
                        <div class="col-lg-10" >
                            <a href="<?php echo e(url('mes_controles')); ?>">
                                <div class="single_service d-flex align-items-center " id="single-examens">
                                    <div class="icon">
                                        <i class="flaticon-error" id="single-examens-col"></i>
                                    </div>
                                    <div class="service_info">
                                        <h4>Controles</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-10" >
                            <a href="<?php echo e(url('mes_Examen')); ?>">
                                <div class="single_service d-flex align-items-center " id="single-controle">
                                    <div class="icon">
                                        <i class="flaticon-book" id="single-controle-col"></i>
                                    </div>
                                    <div class="service_info">
                                        <h4>Examens</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="col-md-8">
            <?php echo $__env->make('layouts.calendrier', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div> 
	<script src="<?php echo e(asset('assets/fullcalendarNPM/js/fullcalendar.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/fullcalendarNPM/js/jquery-and-mask-and-moment.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/fullcalendarNPM/js/bootstrap.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/fullcalendarNPM/js/scriptCalendarEleve.js')); ?>"></script>

</body>

</html><?php /**PATH C:\Users\hb\Desktop\FullCalendar-4.x-Laravel-6.x\resources\views/fullcalendar/views/eleve.blade.php ENDPATH**/ ?>