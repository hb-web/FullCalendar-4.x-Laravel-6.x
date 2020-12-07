<!doctype html>
<html>

<!-- Mirrored from lab.westilian.com/matmix-admin/list-view/dashboard-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Apr 2017 21:18:01 GMT -->

@include('layouts.head')
  <body>
    <div class="bb-alert alert alert-success noty_animated fadeInUp">
        <span>Table Callback Demo Content</span>
    </div>
    <div class="page-container list-menu-view">
        <!--Leftbar Start Here -->

		@include('layouts.sidebar')
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
        <div class="page-content">
            <!--Topbar Start Here -->
            @include('layouts.header')
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
										<h2>Ajouter une class</h2>
									</div>
									
									<form class="form-horizontal" method="POST" action="{{route('addClass')}}" >
										@csrf
										<div class="form-group">
 											<label class="col-md-2 control-label">Question  :</label>
											<div class=" col-md-8">
												<label class="col-md-2 control-label">Question  :</label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Reponse  :</label>
										   <div class=" col-md-10">
											<div class=" widget-block">
												
												 
													<input name="R1" class="i-min-check" type="radio" id="">
													<label for="minimal-radio-2"> Praesent elementum tellus nec.</label>
													<input name="R2" class="i-min-check" type="radio" id="">
													<label for="minimal-radio-4"> Fusce ultricies felis a massa.</label>
													<input name="R3" class="i-min-check" type="radio" id="">
													<label for="minimal-radio-4"> Fusce ultricies felis a massa.</label>
													<label for="minimal-radio-4"> Fusce ultricies felis a massa.</label>
													<input name="R" class="i-min-check" type="radio" id="">
													<label for="minimal-radio-4"> Fusce ultricies felis a massa.</label>
												 
												
												 
												
											</div>
										   </div>
									   </div>
										 
										<div class="form-group">
 											<div class="col-md-8">
												<input type="submit" name="upload" value="ajouter" class="btn btn-success" ><div id="success"></div>
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
            @include('layouts.footer')
        </div>
    </div>
    <!--Rightbar Start Here -->
    @include('layouts.rightBar')
    @include('layouts.script')

    

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>


</body>

<!-- Mirrored from lab.westilian.com/matmix-admin/list-view/dashboard-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Apr 2017 21:18:01 GMT -->

</html>