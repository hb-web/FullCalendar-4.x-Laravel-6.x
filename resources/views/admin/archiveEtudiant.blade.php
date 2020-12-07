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
                                            List des archives des étudiants
                                        </h2>
                                        <ul class="list-page-breadcrumb">
                                        <li><a href="{{url('/')}}">Accueil</a></li>
                                            <li class="active-page">List des archives des étudiants</li>
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
                                    <span class="h-icon"><i class="fa fa-table"></i></span>
                                    <h4><strong> List des archives des étudiants</strong></h4>
                                </div>
                                <div class="widget-container">
                                    <div class="widget-block">
                                        
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered matmix-dt bg-hc-border display responsive nowrap" id="tableMatiere">
                                                <thead>
                                                    <tr>
                                                        <th colspan="4">
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
                                                            Nom complet
                                                        </th>
                                                        <th class="tc-center">
                                                            Email
                                                        </th>
                                                        <th class="tc-center">
                                                            Téléphone
                                                        </th>
                                                        <th class="tc-center">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($Etudiants as $Etudiant)
                                                    <tr>
                                                        <td class="tc-center">
																	 
                                                            <label><b>{{$Etudiant->name}} {{$Etudiant->prenom}} </b></label>
                                                        </td>
                                                        <td class="tc-center">
                                                             
                                                            <label><b>{{$Etudiant->email}} </b></label>
                                                        </td>
                                                        <td class="tc-center">
                                                             
                                                            <label><b>{{$Etudiant->télé}}</b></label>
                                                        </td>
                                                        <td class="tc-center">
                                                            <div class="btn-toolbar" role="toolbar">
                                                                <div class="btn-group" role="group">
                                                                    <a href="{{action('EtudiantController@DéarchiveEtudiant', $Etudiant->id)}}" class="btn btn-info">Désarchiver</a>
                                                                    <a href="{{action('MatiereControler@delateMatiere', $Etudiant->id)}}" class="btn btn-danger">Supprimer</a>
                                                                 </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                            {{ $Etudiants->links() }}
                                        </div>
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
    <script type="text/javascript">
        jQuery(function($) {
            $('#tableMatiere').DataTable({
                "bPaginate": false,
            });
        });
    </script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
</body>
</html>