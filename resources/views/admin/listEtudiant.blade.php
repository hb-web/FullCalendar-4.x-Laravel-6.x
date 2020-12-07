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
		{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="http://malsup.github.com/jquery.form.js"></script> --}}

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
                                        <h2 class="breadcrumb-titles">
                                            Tables list des étudiant  
                                        </h2>
                                        <ul class="list-page-breadcrumb">
										<li><a href="{{url('/')}}">Accueil</a></li>
                                            <li class="active-page"> Tables list des étudiant </li>
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
									<h4><strong> Tables list des étudiant</strong></h4>
                                </div>
                                <div class="widget-container">
                                    <div class="widget-block">
											<div class="table-responsive">
												<table class="table table-hover table-bordered matmix-dt bg-hc-border display responsive nowrap" id="tableEleve" >
													<thead>
														<tr>
															<th colspan="10">
																	<div class="row">
																		<div class="col-6" >
																			<label >Niveau Etude :</label>
																			@csrf
																			<select name="niveauEtude" id="niveauEtude" class="form-control" required>
																				<option disabled="" selected="">Niveau</option>
																				@foreach($FiliereClass as $FC)
																				  <option value="{{ $FC->id }}">{{ $FC->nomFiliere }}</option>
																				@endforeach
																			</select>
																		</div>
																		<div class="col-6" >
																			<label >Class :</label>
																			<select name="class" id="class" class="form-control" required></select>
																		</div>
																	</div>
															</th>
														</tr>
														<tr>
															<th class="tc-center">
																id
															</th>
															<th class="tc-center">
																Nom complet
															</th>
															<th class="tc-center">
																Email
															</th>
															<th class="tc-center">
																téléphone
															</th>
															<th class="tc-center">
																Filiére
															</th>
															<th class="tc-center">
																Class
															</th>
															 
															<th class="tc-center">
																Action
															</th>
														</tr>
													</thead>
													<tbody id="tbodyEleve">
														@foreach($eleves as $eleve)
															<tr>
																<td class="tc-center">
																	 
																	<label><b>{{$eleve->id}} </b></label>
																</td>
																<td class="tc-center">
																	 
																	<label><b>{{$eleve->name}} {{$eleve->prenom}} </b></label>
																</td>
																<td class="tc-center">
																	 
																	<label><b>{{$eleve->email}} </b></label>
																</td>
																<td class="tc-center">
																	 
																	<label><b>{{$eleve->télé}}</b></label>
																</td>
																<td class="tc-center">
																	 
																	<label><b>{{$eleve->nomFiliere}}</b></label>
																</td>
																<td class="tc-center">
																	 
																	<label><b>{{$eleve->nom_class}}</b></label>
																</td>
																<td class="tc-center">
																	<div class="btn-toolbar" role="toolbar">
																		<div class="btn-group" role="group">
																			@csrf 
																			<a href="{{action('EtudiantController@ModifierEtudiant',$eleve->id)}}" class="btn btn-primary">Modifier</a>
 																			<a href="{{action('EtudiantController@archiveEtudiant',$eleve->id)}}" class="btn btn-info">Archiver</a>
																		</div>
																	</div>
																</td>
															</tr>
														@endforeach

													</tbody>
												</table>
											{{$eleves->links()}}
											</div> 
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
	@include('layouts.scriptDashboard') 
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>  
	<script type="text/javascript">
        jQuery(function($) {
          $(document).ready(function(){ 
            var dt=$('#tableEleve').DataTable({
                "bPaginate" : false,
				"order": [[ 0, "desc" ]]	 

              });
			  dt.columns([0]).visible(false);
           });
        });
    </script> 
	<script type="text/javascript">
		jQuery(function($) {
			$('#niveauEtude').change(function () {
			if ($(this).val() != '') {
			  var niveauEtude = $(this).val();
			  var _token = $('input[name="_token"]').val();
			  $.ajax({
				url: "{{ route('filiere') }}",
				method: "POST",
				data: {
				  niveauEtude: niveauEtude,
				  _token: _token
				},
				success: function (result) {
				  $("#class").html(result);
				}
			  })
			}
		  });
		  $('#class').change(function () {
			if ($(this).val() != '') {
			  var idclass = $(this).val();
			  var _token = $('input[name="_token"]').val();
			   
			  $.ajax({
				url: "{{ route('tableEtudiant') }}",
				method: "POST",
				data: {
					idclass: idclass,
					"_token": "{{ csrf_token() }}"
				},
				success: function (result) {
				  $("#tbodyEleve").html(result);
				  $('.pagination').hide();
				}
			  })
			}
			});



		});
	  </script>
		
</body>

</html>