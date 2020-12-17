 
<!doctype html>
<html class="no-js" lang="fr">
    <?php echo $__env->make('fullcalendar.master.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>

    <!-- header-start -->
    <?php echo $__env->make('fullcalendar.master.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
    <!-- header-end -->
    <!-- service_area_start  -->
    <div class="service_area gray_bg">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-4 col-md-6">
                    <div class="single_service d-flex align-items-center ">
                        <div class="icon">
                            <i class="flaticon-school"></i>
                        </div>
                        <div class="service_info">
                            <h4>Formation</h4>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_service d-flex align-items-center ">
                        <div class="icon">
                            <i class="flaticon-error"></i>
                        </div>
                        <div class="service_info">
                            <h4>Cours et exercices</h4>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_service d-flex align-items-center ">
                        <div class="icon">
                            <i class="flaticon-book"></i>
                        </div>
                        <div class="service_info">
                            <h4>Examens</h4>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ service_area_start  -->

    <!-- popular_program_area_start  -->
    <div class="popular_program_area section__padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center">
                        <h3>Notre matière</h3>
                    </div>
                </div>
            </div>
            
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                         
                    </div>
                </div>
                
            </div>



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
                                Nom Examen
                            </th>
                            <th class="tc-center">
                                
                                Description
                            </th>
                            
                            <th>
                                Examen PDF
                            </th>
                            <th class="tc-center">
                                Solution 
                            </th>
                            <th class="tc-center">
                                Niveau étude 
                            </th>
                            <th class="tc-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                     
                        <tr>
                            
                            <td class="tc-center">
                                <label ><b>zefzefzefthtrh</b></label>
                            </td>
                           
                            <td class="tc-center">
                                <label class="label"><b>ezfbgnhngetn</b></label>

                            </td>
                            <td class="tc-center">
                                <label class="label "><b><a href="">zegzegzegzeg</a></b></label>
                            </td>
                            <td class="tc-center">
                                <label class="label"><b><a href="">zefezfzefze</a></b></label>
                            </td>
                            <td class="tc-center">
                                <label class="label"><b>giygihbozez</b></label>
                            </td>
                            <td class="tc-center">
                               
                            </td>
                        </tr>
                       

                    </tbody>
                </table>
            </div>












            <div class="row">
                <div class="col-lg-12">
                    <div class="course_all_btn text-center">
                        <a href="Courses.html" class="boxed-btn4">Voir tous les cours</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_program_area_end -->

    <!-- footer start -->
    <?php echo $__env->make('fullcalendar.master.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <!-- JS here -->
    <?php echo $__env->make('fullcalendar.master.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><script type="text/javascript">
        jQuery(function($) {
            $('#tableMatiere').DataTable({
                "bPaginate": false,
				"order": [[ 0, "desc" ]]

            });
        });
    </script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
</body>

</html><?php /**PATH C:\Users\hb\Desktop\Ecole-formation\resources\views/fullcalendar/views/parental.blade.php ENDPATH**/ ?>