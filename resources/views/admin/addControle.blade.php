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
										<h2>Ajouter Nouvelle controle</h2>
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%
											</div>
										</div>
										
									<br />
									</div>
									<form class="form-horizontal" method="POST" action="{{route('uploadControle')}}" enctype="multipart/form-data">
										{{csrf_field()}}
										<div class="form-group">
 											<label class="col-md-2 control-label">Nom controle :</label>
											<div class=" col-md-8">
												<input type="text" class="form-control" name="nomControle" id="nomControle" required>
											</div>
                    </div>

                  @if(Session::has('idAdmin'))
                    <div class="form-group">
                      <label class="col-md-2 control-label">Professeur :</label>
                     <div class=" col-md-8">
                       <select id="prof" name="prof" class="form-control">
                        <option disabled="" selected="">Choisir Professeur</option>
												@foreach($prof as $p)
												<option value="{{$p->id}}">{{$p->name}} {{$p->prenom}}</option>
												@endforeach
											</select>
                     </div>
                   </div>
                   <div class="form-group">
                    <label class="col-md-2 control-label">Matiére :</label>
                   <div class=" col-md-8">
                     <select id="matiere" name="matiere" class="form-control" readonly> 
                      <option   disabled="" selected="" value="">Choisir Matiére</option>

                    </select>
                    </div>
                 </div> 
                 @endif
                  <div class="form-group">
                    <label class="col-md-2 control-label">Class :</label>
                   <div class=" col-md-8">
                      <select id="class" name="class" class="form-control" required>
                        @if(Session::has('idp'))
                          <option disabled="" selected="" value="">Choisir class</option>
                          @foreach($class as $cl)
                            <option value="{{$cl->id}}">{{$cl->nom_class}}</option>
                          @endforeach
                       @endif
                      </select> 
                      
                   </div>
                  </div>

                  
										<div class="form-group">
 											<label class="col-md-2 control-label">Description :</label>
											<div class=" col-md-8">
											<textarea class="form-control" id="description" name="description" required aria-required="true"></textarea>											</div>
										</div>
										
										 
										<div class="form-group">
											<label class="col-md-2 control-label">PDF examen</label>
											<div class="col-md-8">
												<input type="file" id="PDF" name="PDF" accept="application/pdf">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Solution Examen</label>
											<div class="col-md-8">
												<input type="file" id="solution" name="solution" accept="application/pdf">
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
    @include('layouts.scriptDashboard')

     


<script>
$(document).ready(function(){
  $('#prof').change(function () {
        if ($(this).val() != '') {
          var prof = $(this).val();
          var _token = $('input[name="_token"]').val();
          $.ajax({
            url: "{{ route('ProfClass') }}",
            method: "POST",
            dataType: 'json',
            data: {
              prof: prof,
              _token: _token
            },
            success: function (result) {
              $("#class").html(result.var1); 
              $("#matiere").html(result.var2);
            }
          })
        }
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
          window.location.href = "/listControles";
        }
      }
    });

});
</script>
</body>
</html>