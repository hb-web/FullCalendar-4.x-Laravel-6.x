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
                    <h4><strong> Formulaire Modifier Étudiant</strong></h4>
                  </div>
                  <div class="widget-container">
                    <div class=" widget-block">
                      
                      <form class="form-horizontal" method="POST"
                        action="{{ route('updateEtudiant', [$users->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label class="col-md-2 control-label">Nom Etudiant :</label>
                          <div class=" col-md-8">
                             

                          <input type="text" class="form-control" name="nom" id="nom" value="{{$users->name}}" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-2 control-label">Prénom Etudiant :</label>
                          <div class=" col-md-8">
                            <input type="text" class="form-control" name="prenom" id="prenom" value="{{$users->prenom}}" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-2 control-label">Email :</label>
                          <div class=" col-md-8">
                            <input type="text" class="form-control" name="email" id="email" value="{{$users->email}}" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Téléphone :</label>
                          <div class=" col-md-8">
                            <input type="text" class="form-control" name="tel" id="tel" value="{{$users->télé}}" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Niveau Étude :</label>
                          <div class=" col-md-8">
                            <select name="niveauEtude" id="niveauEtude" class="form-control" required>
                              @if ($users->filiere=="")
                                <option value="">Cet étudiant n'a pas de niveau étude veuillez l'affecter</option>
                                @foreach($FiliereClass as $FC)
                                  <option value="{{ $FC->id }}">{{ $FC->nomFiliere }}</option>
                                @endforeach
                              @else
                               @foreach($FiliereClass as $FC)
                                @if ($FC->id==$users->filiere)
                                  <option value="{{ $FC->id }}" selected>{{ $FC->nomFiliere }}</option>
                                @else
                                  <option value="{{ $FC->id }}">{{ $FC->nomFiliere }}</option>
                                @endif
                               @endforeach
                              @endif
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Class :</label>
                          <div class=" col-md-8">
                            <select name="class" id="class" class="form-control" required>
                             
                            @if ($users->id_class=="")
                              <option value="">Cet étudiant n'a pas de class veuillez l'affecter</option>
                              @foreach($Class as $C)
                              <option value="{{ $C->id }}" >{{ $C->nom_class }}</option>
                              @endforeach
                            @else
                             @foreach($Class as $C)
                              @if ($users->id_class==$C->id)
                                <option value="{{ $C->id }}" selected>{{ $C->nom_class }}</option>
                              @else
                                <option value="{{ $C->id }}" >{{ $C->nom_class }}</option>
                              @endif
                             @endforeach
                            @endif

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
  <script>
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
  </script>
</body>
</html>