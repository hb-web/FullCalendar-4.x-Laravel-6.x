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
            <br>
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
                        <h2>Ajouter Nouveau Étudiant</h2>
                      </div>
                      <form class="form-horizontal" method="POST"
                        action="{{ route('ajouterEtudiant') }}" enctype="multipart/form-data">
                        @csrf

                        @if($errors->any())
                            <div class="alert alert-danger">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              {{$errors->first()}}
                            </div>
                            @endif
                        <div class="form-group">
                          <label class="col-md-2 control-label">Nom Etudiant :</label>
                          <div class=" col-md-8">
                            <input type="text" class="form-control" name="nom" id="nom" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-2 control-label">Prénom Etudiant :</label>
                          <div class=" col-md-8">
                            <input type="text" class="form-control" name="prenom" id="prenom" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-2 control-label">Téléphone :</label>
                          <div class=" col-md-8">
                            <input type="text" class="form-control" name="tel" id="tel" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Niveau Étude :</label>
                          <div class=" col-md-8">
                            <select name="niveauEtude" id="niveauEtude" class="form-control" required>
                              <option disabled="" selected="">Niveau</option>
                              @foreach($FiliereClass as $FC)
                                <option value="{{ $FC->id }}">{{ $FC->nomFiliere }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Class :</label>
                          <div class=" col-md-8">
                            <select name="class" id="class" class="form-control" required></select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">&nbsp;</label>
                          <div class="col-md-8">
                            <div class="form-actions">
                              <button type="submit" class="btn btn-success">Ajouter</button>
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
      </div>


      <!--Footer Start Here -->
      @include('layouts.footer')
    </div>
  </div>
  <!--Rightbar Start Here -->
  @include('layouts.rightBar')
  @include('layouts.scriptDashboard')

  
  <script>
    $(document).ready(function () {
      $('#Niveau').change(function () {
        if ($(this).val() != '') {
          var idNiveau = $(this).val();
          var _token = $('input[name="_token"]').val();
          $.ajax({
            url: "{{ route('filiere') }}",
            method: "POST",
            data: {
              idNiveau: idNiveau,
              _token: _token
            },
            success: function (result) {
              $("#filiere").html(result);
            }
          })
        }
      });


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
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
</body>

<!-- Mirrored from lab.westilian.com/matmix-admin/list-view/dashboard-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Apr 2017 21:18:01 GMT -->

</html>