<header>
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header_top_wrap d-flex justify-content-between align-items-center">
                                <div class="text_wrap">
                                    <?php if(Session::has('idUser')): ?>
                                    <p><span><?php echo e(Session::get('nomcomplet')); ?></span> / <span><?php echo e(Session::get('email')); ?></span></p>
                                    <?php else: ?>
                                    <p><span>+212 6 00 00 00 00</span> <span>info@domain.com</span></p>
                                    <?php endif; ?>
                                </div>
                                <?php if(Session::has('idUser')): ?>
                                    <p>Ma class : <?php echo e(Session::get('Nomclass')); ?></p>
                                <?php endif; ?>
                                <div class="text_wrap">
                                    <p> 
                                        <p><a href="<?php echo e(url('login')); ?>"> <i class="ti-user"></i>  Login</a> 
                                            <a href="<?php echo e(url('register')); ?>"><i class="ti-user"></i> Register</a></p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header_wrap d-flex justify-content-between align-items-center">
                                <div class="header_left">
                                    <div class="logo">
                                        <a href="index.php">
                                            <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="header_right d-flex align-items-center">
                                    <div class="main-menu  d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a href="<?php echo e(url('/')); ?>">Accueil</a></li>
                                                <?php if(Session::has('idUser')): ?>
                                                 <li><a href="<?php echo e(url('mon_programme')); ?>">Mon programe</a></li>
                                                 <li><a href="<?php echo e(url('mes_cours')); ?>">Mes Coures</a></li>
                                                 <li><a href="<?php echo e(url('mes_controles')); ?>">Mes controles</a></li>
                                                 <li><a href="<?php echo e(url('mes_Examen')); ?>">Mes examen</a></li>
                                                <?php endif; ?>
                                                 <li><a href="<?php echo e(url('Contact')); ?>">Contact</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>
 <?php /**PATH C:\Users\hb\Desktop\Ecole-formation\resources\views/fullcalendar/master/header.blade.php ENDPATH**/ ?>