<!doctype html>
<html>

<!-- Mirrored from lab.westilian.com/matmix-admin/list-view/dashboard-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Apr 2017 21:18:01 GMT -->

@include('layouts.head')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script> --}}
 
<meta name="csrf-token" content="{{ csrf_token() }}" />
<body>
	<div class="bb-alert alert alert-success noty_animated fadeInUp">
		<span>Table Callback Demo Content</span>
	</div>
	<div class="page-container list-menu-view">
		<!--Leftbar Start Here -->
		
		@include('layouts.sidebar')
		<div class="page-content">
			<!--Topbar Start Here -->
			@include('layouts.header')	
			<div class="main-container">
				<div class="container-fluid">
					<div class="page-breadcrumb">
						<div class="row">
							<div class="col-md-7">
								<div class="page-breadcrumb-wrap">
									<div class="page-breadcrumb-info">
										<h2 class="breadcrumb-titles">Calendrier class : {{$classe}} @if (Session::has('idAdmin'))du professeur : {{$prof->name}} {{$prof->prenom}} @endif </u></h2>
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
					@include('layouts.calendrierClass')
				</div>
			</div>
			<!--Footer Start Here -->
			@include('layouts.footer')

		</div>
	</div>
	<!--Rightbar Start Here -->
	@include('layouts.rightBar')
	@include('layouts.scriptDashboard')
	<script src="{{asset('assets/fullcalendarNPM/js/fullcalendar.js')}}"></script>
	<script src="{{asset('assets/fullcalendarNPM/js/jquery-and-mask-and-moment.js')}}"></script>
	<script src="{{asset('assets/fullcalendarNPM/js/bootstrap.js')}}"></script>
	<script src="{{asset('assets/fullcalendarNPM/js/scriptCalendar.js')}}"></script>
	
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

</html>