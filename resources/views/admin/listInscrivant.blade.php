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
                                            List des nouveaux étudiants  
                                        </h2>
                                        <ul class="list-page-breadcrumb">
										<li><a href="{{url('/')}}">Accueil</a></li>
                                            <li class="active-page">List des nouveaux étudiants
											</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                             
                        </div>
					</div>
					
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-widget widget-module">
                                <div class="widget-head clearfix">
									<span class="h-icon"><i class="fa fa-table"></i></span>
									<h4><strong> List des nouveaux étudiants</strong></h4>
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
																			 <p>Les étudiants de cette list ne sont pas activer veuillez  </p>
																		</div>
																	</div>
															</th>
														</tr>
														<tr>
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
																	 
																	<label><b>{{$eleve->name}} {{$eleve->prenom}} </b></label>
																</td>
																<td class="tc-center">
																	 
																	<label><b>{{$eleve->email}} </b></label>
																</td>
																<td class="tc-center">
																	 
																	<label><b>{{$eleve->télé}}</b></label>
																</td>
																<td class="tc-center">
																	@if($eleve->nomFiliere==null)
																		<span class="label label-warning"> Pas Filiere</span>
																	@else
																		<label><b>{{$eleve->nomFiliere}}</b></label>
																	@endif
																</td>
																<td class="tc-center">
 																	@if($eleve->nomFiliere==null)
																		<span class="label label-warning"> Pas class</span>
																	@else
																		<label><b>{{$eleve->nom_class}}</b></label>
																	@endif
																</td>
																<td class="tc-center">
																	<div class="btn-toolbar" role="toolbar">
																		<div class="btn-group" role="group">
																			@csrf 
																			<a href="{{action('EtudiantController@ModifierEtudiant',$eleve->id)}}" class="btn btn-primary">Activer</a>
 																			<a href="{{action('EtudiantController@archiveEtudiant',$eleve->id)}}" class="btn btn-info">Archiver</a>
																		</div>
																	</div>
																</td>
															</tr>
														@endforeach

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
            $('#tableEleve').DataTable({
                "bPaginate" : false,
				"order": [[ 0, "desc" ]]

              });
           });
        });
    </script> 
 	
</body>

</html>