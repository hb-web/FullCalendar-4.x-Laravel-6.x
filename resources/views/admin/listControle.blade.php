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
                                            Tables list des controles
                                        </h2>
                                        <ul class="list-page-breadcrumb">
                                            <li><a href="#">Accueil</a></li>
                                            <li class="active-page">List des controles</li>
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
                                    <h4><strong> list des controles</strong></h4>
                                </div>
                                <div class="widget-container">
                                    <div class="widget-block">
                                      										 
											<div class="table-responsive">
												<table
													class="table table-hover table-bordered matmix-dt bg-hc-border display responsive nowrap"
													id="tableMatiere">
													<thead>
														<tr>
															<th colspan="7">
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
																Nom controle
															</th>
															
															<th class="tc-center">
																PDF
															</th>
															<th class="tc-center">
																Solution
															</th> 
														@if(Session::has('idAdmin'))
															<th class="tc-center">
																prof
															</th>
														
															<th class="tc-center">
																Matiére
															</th>	
														@endif
															<th class="tc-center">
																class
															</th>														 
															<th class="tc-center">
																Action
															</th>
														</tr>
													</thead>
													<tbody>
														@foreach($controles as $controle)
															<tr>
																<td class="tc-center">
																	<label><b>{{$controle->nomControle}}</b></label>
																</td>
																<td class="tc-center">
																	<label><b>{{$controle->controle_PDF}}</b></label>
																</td>
																<td class="tc-center">
																	<label><b>{{$controle->solution_PDF}}</b></label>
																</td> 
															@if(Session::has('idAdmin'))
																<td class="tc-center">
																	<label><b>{{$controle->name}} {{$controle->prenom}}</b></label>
																</td>
															
																<td class="tc-center">
																	<label><b>{{$controle->nomMatiere}}</b></label>
																</td>
															@endif
																<td class="tc-center">
																	<label><b>{{$controle->nom_class}}</b></label>
																</td>
																 
																<td class="tc-center">
																	<div class="btn-toolbar" role="toolbar">
																		<div class="btn-group" role="group">
 																			<a href="" class="btn btn-primary">Modifier</a>															 
																			<a href="" class="btn btn-info">Archiver</a>															 
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

	<script type="text/javascript">
		jQuery(function ($) {
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

<!-- Mirrored from lab.westilian.com/matmix-admin/list-view/dashboard-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Apr 2017 21:18:01 GMT -->

</html>