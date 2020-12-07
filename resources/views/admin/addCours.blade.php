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
                        <br>
                        <div class="col-md-12">
                          <div class="box-widget widget-module">
                            <div class="widget-head clearfix">
                              <span class="h-icon"><i class="fa fa-bars"></i></span>
                            <h4>Form Elements </h4>
                            </div>
                            <div class="widget-container">
                              <div class=" widget-block">
                                <div class="page-header">
                                  <h2>Ajouter Nouvelle cours</h2>
                                  <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%
                                    </div>
                                  </div>
                                  
                                <br />
                                </div>
                                <form class="form-horizontal" method="POST" action="{{route('uploadCour')}}" enctype="multipart/form-data">
                                  @csrf
                                  @if(Session::has('idprof')) 
                                  <div class="form-group">
                                    <div class=" col-md-8">
                                      <input type="hidden" class="form-control" name="prof" id="prof" value="{{Session::get('idprof')}}">
                                    </div>
                                  </div>
                                  @else
                                  <div class="form-group">
                                    <label class="col-md-2 control-label">Proffesseur :</label>
                                  <div class=" col-md-8">
                                    <select class="form-control" name="prof" id="prof">
                                      <option disabled="" selected="">Choisir Prof</option>
                                        @foreach($profs as $prof)
                                          <option value="{{ $prof->id }}">{{ $prof->name }} {{ $prof->prenom }}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                </div>

                                  
                                  @endif
                                  <div class="form-group">
                                    <label class="col-md-2 control-label">Nom Cours :</label>
                                    <div class=" col-md-8">
                                      <input type="text" class="form-control" name="cours" id="cours" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-2 control-label">Description :</label>
                                    <div class=" col-md-8">
                                    <textarea class="form-control" id="description" name="description" required aria-required="true"></textarea>											
                                  </div>
                                  </div>
                                  
                                  
                                  <div class="form-group">
                                    <label class="col-md-2 control-label">PDF</label>
                                    <div class="col-md-8">
                                      <input type="file" id="PDF" name="PDF" accept="application/pdf">
                                    </div>
                                  </div>
                                  
                                  <div class="form-group">
                                    <label class="col-md-2 control-label">Type video :</label>
                                    <div class=" col-md-8">
                                      <input type="radio" name="r" id="r2"> Upload video
                                      <input type="radio" name="r" id="r"> Youtube                                   
                                    </div>
                                  </div>

                                  <div class="form-group" id="video" style="display: none">
                                    <label class="col-md-2 control-label">Video</label>
                                    <div class="col-md-8">
                                      <input type="file"  name="video" accept="video/mp4,video/x-m4v,video/*">
                                    </div>
                                  </div>
                                  <div class="form-group" id="youtube" style="display: none">
                                    <label class="col-md-2 control-label">Video youtube</label>
                                    <div class="col-md-8">
                                      <input type="text"  name="videoYoutube" class="form-control">
                                    </div>
                                  </div>
                                  
                                  <div class="form-group">
                                    <div class="col-md-8">
                                      
                                      <input type="submit" name="upload" value="inserer" class="btn btn-success" ><div id="success"></div>
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
    @include('layouts.script')

    

<script>
$(document).ready(function(){
  $('#r').change(function(){
    $('#youtube').show();
    $('#video').hide();
  });
  $('#r2').change(function(){
    $('#video').show();
    $('#youtube').hide();
  });


    $('form').ajaxForm({
      beforeSend:function(){
        $('#success').empty();
      },
      uploadProgress:function(event, position, total, percentComplete)
      {
        $('.progress-bar').text(percentComplete + '%');
        $('.progress-bar').css('width', percentComplete + '%');
      },
      success:function(data)
      {
        if(data.errors)
        {
          $('.progress-bar').text('0%');
          $('.progress-bar').css('width', '0%');
          $('#success').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
        }
        if(data.success)
        {
          $('.progress-bar').text('Téléchargé');
          $('.progress-bar').css('width', '100%');
          $('#success').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');
          window.location.href = "listCours/";
        }
      }
    });

});
</script>
</body>

</html>