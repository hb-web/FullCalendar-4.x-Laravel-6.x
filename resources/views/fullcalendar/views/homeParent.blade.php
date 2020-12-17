 
<!doctype html>
<html class="no-js" lang="fr">
    @include('fullcalendar.master.head')
<body>

    @include('fullcalendar.master.header') 
    <div class="recent_news_area section__padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section_title text-center mb-70">
                        <h3 class="mb-45">Mes enfants </h3>
                     </div>
                </div>
            </div>
            <div class="row">
            @foreach($parinages as $parinage)
                <div class="col-md-4">
                    <div class="single__news">
                        <div class="thumb">
                            <a href="enfant-{{$parinage->id}}">
                                <img src="assets/upload/profile/etudiants/{{$parinage->avatar}}" alt="">
                            </a>
                            <span class="badge">{{$parinage->name." ".$parinage->prenom}}</span>
                        </div>
                        
                    </div>
                </div>
            @endforeach              
            </div>
        </div>
    </div>
    <div class="latest_coures_area">
        <div class="latest_coures_inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="coures_info">
                            <div class="section_title white_text">
                                <h3>Bienvenu</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br> tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <br> veniam, quis nostrud exercitation.</p>
                            </div>
                            <div class="coures_wrap d-flex">
                                <div class="single_wrap">
                                    <div class="icon">
                                        <i class="flaticon-lab"></i>
                                    </div>
                                    <h4>Baccalauréat</h4>
                                        <p>Lorem ipsum dolor sit amet, sectetur adipiscing elit, sed do eiusmod tpor incididunt ut piscing vcs.</p>
                                        <a href="#" class="boxed-btn5">Commancer</a>
                                </div>
                                <div class="single_wrap">
                                    <div class="icon">
                                        <i class="flaticon-lab"></i>
                                    </div>
                                    <h4>1 er bac <br></h4>
                                        <p>Lorem ipsum dolor sit amet, sectetur adipiscing elit, sed do eiusmod tpor incididunt ut piscing vcs.</p>
                                        <a href="#" class="boxed-btn5">Commancer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
     
    <!-- footer start -->
    @include('fullcalendar.master.footer')
    
    <!-- JS here -->
    @include('fullcalendar.master.script')

</body>

</html>