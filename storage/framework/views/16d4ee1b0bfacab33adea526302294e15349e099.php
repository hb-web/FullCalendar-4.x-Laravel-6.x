 
<!doctype html>
<html class="no-js" lang="fr">
    <?php echo $__env->make('fullcalendar.master.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>

    <!-- header-start -->
    <?php echo $__env->make('fullcalendar.master.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
    <!-- latest_coures_area_start  -->
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
    <!--/ latest_coures_area_end -->





    <!-- recent_news_area_start  -->
    <div class="recent_news_area section__padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section_title text-center mb-70">
                        <h3 class="mb-45">Nouvelles récentes</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="single__news">
                        <div class="thumb">
                            <a href="single-blog.html">
                                <img src="<?php echo e(asset('assets/img/news/1.png')); ?>" alt="">
                            </a>
                            <span class="badge">Group Study</span>
                        </div>
                        <div class="news_info">
                            <a href="">
                                <h4>blog 1</h4>
                            </a>
                            <p class="d-flex align-items-center"> <span><i class="flaticon-calendar-1"></i> May 10, 2020</span> 
                            
                            <span> <i class="flaticon-comment"></i> 01 comments</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single__news">
                        <div class="thumb">
                            <a href="single-blog.html">
                                <img src="<?php echo e(asset('assets/img/news/2.png')); ?>" alt="">
                            </a>
                            <span class="badge bandge_2">Hall Life</span>
                        </div>
                        <div class="news_info">
                            <a href="">
                                <h4>blog 2</h4>
                            </a>
                            <p class="d-flex align-items-center"> <span><i class="flaticon-calendar-1"></i> May 10, 2020</span> 
                            
                            <span> <i class="flaticon-comment"></i> 01 comments</span>
                            </p>
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

</html><?php /**PATH C:\Users\hb\Desktop\FullCalendar-4.x-Laravel-6.x\resources\views/fullcalendar/views/homeParent.blade.php ENDPATH**/ ?>