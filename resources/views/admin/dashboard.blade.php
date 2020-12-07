<!doctype html>
<html>

<!-- Mirrored from lab.westilian.com/matmix-admin/list-view/dashboard-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Apr 2017 21:18:01 GMT -->

@include('layouts.head')
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
									<h2 class="breadcrumb-titles">Dashboard</h2>
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
				
				<div class="row">
				@if(Session::has('idAdmin'))	
					<div class="col-md-3 col-sm-6">
						<div class="iconic-w-wrap number-rotate"><br>
							<a href="#" class="ico-cirlce-widget w_bg_cyan">
								<span><i class="ico-users"></i></span>
							</a>
							<div class="w-meta-info">
								<span class="w-meta-value number-animate" data-value="{{$prof}}" data-animation-duration="1500">{{$prof}}</span>
								<span class="w-previos-stat">Nombre des professeur</span>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-6">
						<div class="iconic-w-wrap iconic-w-wrap">
							<br>
							<a href="#" class="ico-cirlce-widget w_bg_yellow">
								<span><i class="ico-users"></i></span>
							</a>
							<div class="w-meta-info">
								<span class="w-meta-value number-animate" data-value="{{$Matiere}}" data-animation-duration="1500">{{$Matiere}}</span>
								<span class="w-previos-stat">Nombre des matières</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="iconic-w-wrap iconic-w-wrap">
							<br>
							<a href="#" class="ico-cirlce-widget w_bg_blue">
								<span><i class="ico-users"></i></span>
							</a>
							<div class="w-meta-info">
								<span class="w-meta-value number-animate" data-value="{{$Cours}}" data-animation-duration="1500">{{$Cours}}</span>
								<span class="w-previos-stat">Nombre des cours</span>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-6">
						<div class="iconic-w-wrap iconic-w-wrap">
							<br>
							<a href="#" class="ico-cirlce-widget w_bg_green">
								<span><i class="ico-chart"></i></span>
							</a>
							<div class="w-meta-info">
								<span class="w-meta-value number-animate" data-value="{{$filieres}}" data-animation-duration="1500">{{$filieres}}</span>
								
								<span class="w-previos-stat">Nombre des filières</span>
							</div>
						</div>
					</div>
					@endif
				
					
					<div class="col-md-3 col-sm-6">
						<div class="iconic-w-wrap iconic-w-wrap">
							<br>
							<a href="#" class="ico-cirlce-widget w_bg_red">
								<span><i class="ico-users"></i></span>
							</a>
							<div class="w-meta-info">
								<span class="w-meta-value number-animate" data-value="{{$users}}" data-animation-duration="1500">{{$users}}</span>
								<span class="w-previos-stat">Nombre des étudiant</span>
							</div>
						</div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6">
						<div class="iconic-w-wrap iconic-w-wrap">
							<br>
							<a href="#" class="ico-cirlce-widget w_bg_green">
								<span><i class="ico-users"></i></span>
							</a>
							<div class="w-meta-info">
								<span class="w-meta-value number-animate" data-value="{{$class}}" data-animation-duration="1500">{{$class}}</span>
								<span class="w-previos-stat">Nombre des classes</span>
							</div>
						</div>
                    </div>
                    <div class="col-md-3 col-sm-6">
						<div class="iconic-w-wrap iconic-w-wrap">
							<br>
							<a href="#" class="ico-cirlce-widget w_bg_indigo">
								<span><i class="ico-users"></i></span>
							</a>
							<div class="w-meta-info">
								<span class="w-meta-value number-animate" data-value="{{$examens}}" data-animation-duration="1500">{{$examens}}</span>
								<span class="w-previos-stat">Nombre des examens</span>
							</div>
						</div>
                    </div>
                    <div class="col-md-3 col-sm-6">
						<div class="iconic-w-wrap iconic-w-wrap">
							<br>
							<a href="#" class="ico-cirlce-widget w_bg_red">
								<span><i class="ico-users"></i></span>
							</a>
							<div class="w-meta-info">
								<span class="w-meta-value number-animate" data-value="{{$lives}}" data-animation-duration="1500">{{$lives}}</span>
								<span class="w-previos-stat">Nombre des Salle en ligne</span>
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
	<script src="{{asset('assets/fullcalendarNPM/js/fullcalendar.js')}}"></script>
	<script src="{{asset('assets/fullcalendarNPM/js/jquery-and-mask-and-moment.js')}}"></script>
	<script src="{{asset('assets/fullcalendarNPM/js/bootstrap.js')}}"></script>
	<script src="{{asset('assets/fullcalendarNPM/js/scriptCalendar.js')}}"></script>
	<script src="{{asset('assets/fullcalendarNPM/js/retina.min.js')}}"></script>
	<script>
		$(document).ready(function(){
			$("#type").change(function(){
				if($("#type").val()=='document')
				{
					$("#salles").hide();
					$("#cours").show();
				}
				else{
						$("#salles").show();
						$("#cours").hide();
					}
			});
		});
	</script>



	
</body>

<!-- Mirrored from lab.westilian.com/matmix-admin/list-view/dashboard-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Apr 2017 21:18:01 GMT -->

</html>