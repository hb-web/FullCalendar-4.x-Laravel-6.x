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
                        <h2>Ajouter Nouveau étudiant</h2>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%
                          </div>
                        </div>

                        <br />
                      </div>


                      <form class="form-horizontal" method="POST"
                        action="{{ route('ajouterEtudiant') }}" enctype="multipart/form-data">
                        {{csrf_field()}}

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
                          <label class="col-md-2 control-label">Image</label>
                          <div class="col-md-8">
                            <input type="file" id="image" name="image"  >
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
                              <div id="success"></div>
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
    $(document).ready(function() {
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

      $('form').ajaxForm({
        beforeSend: function() {
          $('#success').empty();
        },
        uploadProgress: function(event, position, total, percentComplete) {
          $('.progress-bar').text(percentComplete + '%');
          $('.progress-bar').css('width', percentComplete + '%');
        },
        success: function(data) {
          if (data.errors) {
            $('.progress-bar').text('0%');
            $('.progress-bar').css('width', '0%');
            $('#success').html('<span class="text-danger"><b>' + data.errors + '</b></span>');
          }
          if (data.success) {
            $('.progress-bar').text('Téléchargé');
            $('.progress-bar').css('width', '100%');
            $('#success').html('<span class="text-success"><b>' + data.success + '</b></span><br /><br />');
            window.location.href = "listControles";
          }
        }
      });

    });
  </script>
</body>

</html>