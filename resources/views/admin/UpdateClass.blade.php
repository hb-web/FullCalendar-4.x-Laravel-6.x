<!doctype html>
<html>
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
              <div class="col-md-7">
                  <div class="page-breadcrumb-wrap">
                      <div class="page-breadcrumb-info">
                          <h2 class="breadcrumb-titles">
                            Modifier Étudiant  
                          </h2>
                          <ul class="list-page-breadcrumb">
                            <li><a href="{{url('/')}}">Accueil</a></li>
                              <li class="active-page">Modifier Étudiant</li>
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
                    <span class="h-icon"><i class="fa fa-bars"></i></span>
                    <h4><strong> Modifier Nom class </strong></h4>
                  </div>
                  <div class="widget-container">
                    <div class=" widget-block">
                      
                      <form class="form-horizontal" method="POST"
                        action="{{route('ModifierNomClass')}}" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="col-md-2 control-label">Filiére :</label>
							<div class=" col-md-8">
								<input type="hidden" value="{{$class->id}}" name='id'>
								<select name="filiere" id="filiere" class="form-control" required>
									@foreach ($filieres as $filiere)
										@if($class->filiere==$filiere->id)
											<option value="{{$filiere->id}}" selected>{{$filiere->nomFiliere}}</option>
										@else
										<option value="{{$filiere->id}}">{{$filiere->nomFiliere}}</option>
										@endif
									@endforeach
									
								</select>
							</div>
						  </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Nom Class :</label>
                          <div class=" col-md-8">
                           
                          <input type="text" class="form-control" name="nom" id="nom" value="{{$class->nom_class}}" required>
                          </div>
                        </div>
                        
                        
                        <div class="form-group">
                          <label class="col-md-2 control-label">&nbsp;</label>
                          <div class="col-md-8">
                            <div class="form-actions">
                              <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
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
      @include('layouts.footer')
    </div>
  </div>
  @include('layouts.rightBar')
  @include('layouts.scriptDashboard')
  
</body>
</html>