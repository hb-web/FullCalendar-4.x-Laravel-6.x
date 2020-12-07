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
                                            List des archive des cours
                                        </h2>
                                        <ul class="list-page-breadcrumb">
                                            <li><a href="#">Home</a></li>
                                            <li class="active-page">Tables</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-widget widget-module">
                                <div class="widget-head clearfix">
                                    <span class="h-icon"><i class="fa fa-table"></i></span>
                                </div>
                                <div class="widget-container">
                                    <div class="widget-block">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered matmix-dt bg-hc-border display responsive nowrap" id="tableMatiere">
                                                <thead>
                                                    <tr>
                                                        <th colspan="6">
                                                            <div class="dt-col-header">
                                                                All new registered users.
                                                            </div>
                                                            <p>
                                                                This is a example of a complex header table
                                                                you can use this syle in any kind of table.
                                                            </p>
                                                        </th>

                                                    </tr>
                                                    <tr>
                                                        <th class="tc-center">
                                                            <input class="tc-check-all" type="checkbox" value="0" />
                                                        </th>

                                                        <th class="tc-center">
                                                             Cours
                                                        </th>
                                                        <th>
                                                             Déscription
                                                        </th>
                                                        <th>
                                                            PDF
                                                        </th>
                                                        <th>
                                                            Video
                                                        </th>
                                                        <th class="tc-center">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $cours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td class="tc-center">
                                                            <input type="checkbox" class="tc-check" value="0" />
                                                        </td>
                                                        
                                                        <td class="tc-center">
                                                            <label class="label label-info"><b><?php echo e($cour->nomCour); ?></b></label>

                                                        </td>
                                                        <td class="tc-center">
                                                            <p>
                                                                <?php echo e($cour->description); ?>

                                                            </p>
                                                        </td>
                                                        
                                                        <td class="tc-center">
                                                           <a href=""><?php echo e($cour->PDF); ?></a>
                                                        </td>
                                                        <td class="tc-center">
                                                            <a href=""><?php echo e($cour->video); ?></a>
                                                         </td>

                                                        <td class="tc-center">
                                                            <div class="btn-toolbar" role="toolbar">
                                                                <div class="btn-group" role="group">
                                                                    <a href="<?php echo e(action('CourController@désarchiver', $cour->id)); ?>" class="btn btn-info">Désarchiver</a>
                                                                    <a href="<?php echo e(action('CourController@delate', $cour->id)); ?>" class="btn btn-danger">Supprimer</a>
                                                                    

                                                                </div>
                                                            </div>
                                                        </td>
                                                        
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </tbody>
                                            </table>
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
            $('#tableMatiere').DataTable({
                "bPaginate" : false

            });
        });
    </script>

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>


</body>

<!-- Mirrored from lab.westilian.com/matmix-admin/list-view/dashboard-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Apr 2017 21:18:01 GMT -->

</html><?php /**PATH C:\Users\BADR\Desktop\FullCalendar-4.x-Laravel-6.x\resources\views/admin/archiveCours.blade.php ENDPATH**/ ?>