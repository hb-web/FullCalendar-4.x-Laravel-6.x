<!doctype html>
<html>
@include('layouts.head')

<body>
	<div class="bb-alert alert alert-success noty_animated fadeInUp">
		<span>Tables list des Professeurs</span>
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
                                            Tables list des Professeurs

                                        </h2>
                                        <ul class="list-page-breadcrumb">
                                            <li><a href="#">Home</a></li>
                                            <li class="active-page">list des Professeurs</li>
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
                                    <h4><strong> Complex Header Example</strong></h4>
                                </div>
                                <div class="widget-container">
                                    <div class="widget-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                            <a href="{{url('AjouterProf')}}" class="btn btn-success">Ajouter Professeur</a>
                                            </div>
                                        </div>
                                        <br> 
										 
											<div class="table-responsive">
												<table
													class="table table-hover table-bordered matmix-dt bg-hc-border display responsive nowrap"
													id="tableProf">
													<thead>
														 
														<tr>
															<th class="tc-center">
																Nom complet
															</th>
															<th class="tc-center">
																Téléphone
															</th>
															<th class="tc-center">
																Email
															</th>
															<th class="tc-center">
																Matière
															</th>
															<th class="tc-center">
																Action
															</th>
														</tr>
													</thead>
													<tbody>
														@foreach($profs as $prof)
															<tr>
																
																<td class="tc-center">
																	<label><b>{{$prof->name}} {{$prof->prenom}}</b></label>
																</td>
																<td class="tc-center">
																	<label><b>{{$prof->télé}}</b></label>
																</td>
																<td class="tc-center">
																	<label><b>{{$prof->email}}</b></label>
																</td>
																 <td class="tc-center">
																	<label><b>{{$prof->nomMatiere}}</b></label>
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
			$('#tableProf').DataTable({
				"bPaginate": false,
				"order": [[ 0, "desc" ]]

			});
		});
	</script>

	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>


</body>

</html>