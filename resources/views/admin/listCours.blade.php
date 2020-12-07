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
                                            Tables <small>A different styled complex table</small>
                                        </h2>
                                        <ul class="list-page-breadcrumb">
                                            <li><a href="#">Home</a></li>
                                            <li class="active-page">Tables</li>
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
                                    <h4>A Complex Header Example</h4>
                                </div>
                                <div class="widget-container">
                                    <div class="widget-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                            <a href="{{url('ajouterCours')}}" class="btn btn-success">Ajouter cour</a>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered matmix-dt bg-hc-border display responsive nowrap" id="tableMatiere">
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
                                                             Cours
                                                        </th>
                                                        <th>
                                                             Déscription
                                                        </th>
                                                        <th>
                                                            PDF
                                                        </th>
                                                        <th>
                                                            Video
                                                        </th>
                                                      @if (!Session::has('idprof'))
                                                        <th>
                                                          Professeur
                                                        </th>
                                                      @endif


                                                        <th class="tc-center">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($cours as $cour)
                                                    <tr>
                                                        
                                                        <td class="tc-center">
                                                            <label class="label label-info"><b>{{$cour->nomCour}}</b></label>

                                                        </td>
                                                        <td class="tc-center">
                                                            <p>
                                                                {{Str::limit($cour->description, 50)}}
                                                            </p>
                                                        </td>
                                                        
                                                        <td class="tc-center">
                                                           <a href="">{{$cour->PDF}}</a>
                                                        </td>
                                                        <td class="tc-center">
                                                            <a href="">{{$cour->video}}</a>
                                                         </td>
                                                        @if (!Session::has('idprof'))
                                                          <td class="tc-center">
                                                             {{$cour->name}} {{$cour->prenom}} 
                                                          </td>
                                                        @endif

                                                        <td class="tc-center">
                                                            <div class="btn-toolbar" role="toolbar">
                                                                <div class="btn-group" role="group">
                                                                <a href="{{action('CourController@updatCour', $cour->id)}}" class="btn btn-primary">Modifier</a>
                                                                <a href="{{action('CourController@ArchiveCours', $cour->id)}}" class="btn btn-warning">Archiver</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                            {{$cours->links()}}
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
        jQuery(function($) {
          $(document).ready(function(){
            $('#tableMatiere').DataTable({
                "bPaginate" : false,
				"order": [[ 0, "desc" ]]

              });
           });
        });
    </script>
 
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script> 
   
</body>

</html>