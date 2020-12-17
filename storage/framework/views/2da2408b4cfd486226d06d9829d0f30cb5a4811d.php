 
<!doctype html>
<html class="no-js" lang="fr">
    <?php echo $__env->make('fullcalendar.master.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>

    <?php echo $__env->make('fullcalendar.master.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <div class="recent_news_area section__padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section_title text-center mb-70">
                        <h3 class="mb-45">Mes enfants </h3>
                     </div>
                </div>
            </div>
            <div class="row">
            <?php $__currentLoopData = $parinages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parinage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="single__news">
                        <div class="thumb">
                            <a href="enfant-<?php echo e($parinage->id); ?>">
                                <img src="assets/upload/profile/etudiants/<?php echo e($parinage->avatar); ?>" alt="">
                            </a>
                            <span class="badge"><?php echo e($parinage->name." ".$parinage->prenom); ?></span>
                        </div>
                        
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
            </div>
        </div>
    </div>
    <div class="latest_coures_area">
        <div class="latest_coures_inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="coures_info">
                            <div class="section_title white_text">
                                <h3>Bienvenu</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br> tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <br> veniam, quis nostrud exercitation.</p>
                            </div>
                            <div class="coures_wrap d-flex">
                                <div class="single_wrap">
                                    <div class="icon">
                                        <i class="flaticon-lab"></i>
                                    </div>
                                    <h4>Baccalauréat</h4>
                                        <p>Lorem ipsum dolor sit amet, sectetur adipiscing elit, sed do eiusmod tpor incididunt ut piscing vcs.</p>
                                        <a href="#" class="boxed-btn5">Commancer</a>
                                </div>
                                <div class="single_wrap">
                                    <div class="icon">
                                        <i class="flaticon-lab"></i>
                                    </div>
                                    <h4>1 er bac <br></h4>
                                        <p>Lorem ipsum dolor sit amet, sectetur adipiscing elit, sed do eiusmod tpor incididunt ut piscing vcs.</p>
                                        <a href="#" class="boxed-btn5">Commancer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
     
    <!-- footer start -->
    <?php echo $__env->make('fullcalendar.master.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <!-- JS here -->
    <?php echo $__env->make('fullcalendar.master.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html><?php /**PATH C:\Users\hb\Desktop\Ecole-formation\resources\views/fullcalendar/views/homeParent.blade.php ENDPATH**/ ?>