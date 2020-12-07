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
                    <h4><strong> Changer le professeur d'une class </strong></h4>
                  </div>
                  <div class="widget-container">
                    <div class=" widget-block">
                      
                      <form class="form-horizontal" method="POST"
                        action="{{route('changeClassProf')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label class="col-md-2 control-label">Class :</label>
                          <div class=" col-md-8">
                            <input type="hidden" value="{{$ligneClassProf->id}}" name='id'>
                          <input type="text" class="form-control" name="nom" id="nom" value="{{$ligneClassProf->nom_class}}" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Professeur :</label>
                          <div class=" col-md-8">
                            <select name="prof" id="prof" class="form-control" required>
                              @foreach ($profs as $prof)
                                  @if($ligneClassProf->Prof==$prof->id)
                                    <option value="{{$prof->id}}" selected>{{$prof->name}} {{$prof->prenom}}</option>
                                  @else
                                  <option value="{{$prof->id}}">{{$prof->name}} {{$prof->prenom}}</option>
                                  @endif
                              @endforeach
                               
                            </select>
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
  {{-- <script>
    $(document).ready(function () {
       
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

    });
  </script> --}}
</body>
</html>