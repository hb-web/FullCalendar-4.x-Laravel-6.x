<?php

use App\Controle;
use App\Cour;
use App\Event;
use App\Examen;
use App\Filiere;
use App\LigneClassProf;
use App\Matiere;
use App\live;
use App\Professeur;
use App\User;
use App\Parents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//back office 


Route::get('login_admin', 'LoginController@login_admin');
Route::post('checkLoginAdmin', 'LoginController@checkLoginAdmin')->name('checkLoginAdmin');
Route::get('Contact', 'LoginController@Contact');

Route::get('login_prof', function () {
    return view("security.login_Panel");
    });
Route::get('mes_cours', function () {
    $filiere=Session::get('filiere');
    $matieres=Matiere::join('filieres','matieres.mfiliere','filieres.id')->where('nomFiliere',$filiere)->get();
    $cours=Cour::select('Cours.id','nomCour','description','nomMatiere','photoMat')
    ->join('matieres','cours.matiere','matieres.id')
    ->join('filieres','matieres.mfiliere','filieres.id')->where('nomFiliere',$filiere)->get();
    
    return view("fullcalendar.views.mesCours",compact('matieres','cours'));
    });
Route::post('checkLoginPanel', 'LoginController@checkLoginPanel');
Route::get('login', 'LoginController@index');
Route::get('/', function () {
    return view("fullcalendar.views.index");
    });

Route::get('dashboard', function (Request $request) {
        if(Session::get('idAdmin'))
        {
            $request->session()->forget('idprof');
            $prof = DB::table('professeurs')->count();
            $users = DB::table('users')->count();
            $class = DB::table('classes')->count();
            $Matiere = DB::table('matieres')->count();
            $Cours = DB::table('cours')->count();
            $examens = DB::table('examens')->count();
            $lives = DB::table('lives')->count();
            $filieres = DB::table('filieres')->count();
            $events=DB::table('events')->where('etat',0)->count(); 
            Session::put('cntEvent', $events);
            return view("admin.dashboard",compact(['prof','users','class','Matiere','Cours','examens','lives','filieres'])); 
            
        
        }else{
            if(Session::get('idprof'))
            {
                $prof=Session::get('idprof');
                $users=User::select('users.*')->join('classes','users.id_class','classes.id')->join('ligne_class_profs','ligne_class_profs.Class','classes.id')->where('ligne_class_profs.Prof',$prof)->count();
                $class=LigneClassProf::where('Prof',$prof)->count();
                $lives = live::where('prof',$prof)->count();
                $examens = Examen::where('prof',$prof)->count(); 
                $request->session()->forget('idAdmin');
                return view("admin.dashboard",compact(['users','class','examens','lives'])); 

            }else{
                if(Session::get('idParent'))
                {
                    $Parent=Session::get('idParent');
                     
                    $users=Parents::all();
                    print_r($users);
                    die;


                    // ->join('classes','users.id_class','classes.id')
                    // ->join('ligne_class_profs','ligne_class_profs.Class','classes.id')
                    // ->where('ligne_class_profs.Prof',$prof)->count();

                    //$class=LigneClassProf::where('Prof',$prof)->count();
                    //$lives = live::where('prof',$prof)->count();
                    //$examens = Examen::where('prof',$prof)->count(); 
                    //$request->session()->forget('idAdmin');
                    //return view("admin.dashboard",compact(['users','class','examens','lives'])); 
                    

                }else{   
                    return redirect('/');
                }


            }

           
        }   
    });
Route::get('/mycalender/{class}/{id}','EventController@mycalender');
    //matieres
Route::get('listMatiere', 'MatiereControler@index');
//page modification matiere
Route::get('ModifierMatiere/{id}', 'MatiereControler@updatMatiere');

 //action update matiere
 Route::post('updateMatiere/{id}', 'MatiereControler@ActionupdatMatiere')->name('updateMatiere');



// rout upload
Route::get('AjouterMatiere', 'MatiereControler@AjouterMatiere');
Route::get('AjouterMatiere2', 'MatiereControler@AjouterMatiere');
Route::post('file-upload/upload', 'MatiereControler@upload')->name('upload');

// les cours 
Route::get('listCours', 'CourController@index');
Route::get('courMedia/{id}',function ($id) {
    $cours=Cour::where('id',$id)->first();
     return view("eleve.mediaCours",compact('cours')); 
});
//archive cour

Route::get('les_Archives_Cours', 'CourController@ListArchiveCours');
Route::get('ArchiveCours/{id}', 'CourController@ArchiveCours');
Route::get('désarchiver/{id}', 'CourController@désarchiver');
//ajouter cour
Route::get('ajouterCours', 'CourController@addCours');
// add cour
Route::post('pdf-upload/upload', 'CourController@upload')->name('uploadCour');

//update cours
Route::get('ModifierCours/{id}', 'CourController@updatCour');
//supprimer cour
Route::get('supCours/{id}', 'CourController@delate');

//action update matiere
Route::post('updateCours/{id}', 'CourController@ActionupdatCours')->name('updatCours');

Route::get('courEvent/{id}','CourController@courEvent') ;
//archive matiere

Route::get('les_Archives_Matiere', 'MatiereControler@ListArchiveMatiere');
Route::get('ArchiveMatiere/{id}', 'MatiereControler@ArchiveMatiere');
Route::get('désarchiverMatiere/{id}', 'MatiereControler@désarchiverMatiere');
Route::get('supMatiere/{id}', 'MatiereControler@delateMatiere');
//route examen :
Route::get('listExamens', 'ExamenController@index');
Route::get('listCorectionExamens', 'ExamenController@corectionExam');
Route::get('AjouterExamens', 'ExamenController@AjouterExamens');
Route::post('uploadExam', 'ExamenController@uploadExam')->name('uploadExam');
//page a supprimer
Route::get('formuleReExamen', 'ExamenController@formuleReExamen');
// archive examen
Route::get('les_Archives_Examen', 'ExamenController@ListArchiveExamen');
Route::get('ArchiveExamen/{id}', 'ExamenController@ArchiveExamen');
Route::get('désarchiverExamen/{id}', 'ExamenController@desarchiverExamen');
Route::get('/supExamen/{id}', 'ExamenController@delateExamen');
//page modification matiere
Route::get('ModifierExamen/{id}', 'ExamenController@updatExamen');
// Etudiant
Route::get('listEtudiant', 'EtudiantController@listEtudiant'); 
//list nouveau etudiant
Route::get('listInscrivant', 'EtudiantController@listInscrivant'); 

Route::get('addEtudiant', 'EtudiantController@addEtudiant');
Route::post('ajouterEtudiant', 'EtudiantController@ajouterEtudiant')->name('ajouterEtudiant');
Route::get('archiveEtudiant/{id}', 'EtudiantController@archiveEtudiant');
Route::get('ListArchiveEtudiant', 'EtudiantController@ListArchiveEtudiant');
Route::get('DéarchiveEtudiant/{id}', 'EtudiantController@DéarchiveEtudiant');
Route::get('ModifierEtudiant/{id}', 'EtudiantController@ModifierEtudiant'); 
Route::post('/updateEtudiant/{id}', 'EtudiantController@updateEtudiant')->name('updateEtudiant');
//travail etudiant
Route::get('/Class_Niveau/{nom}/{id}', 'ExamenController@classNiveau');
Route::post('travailEtudiant', 'ExamenController@travailEtudiant')->name('travailEtudiant');
 //action update matiere
//  Route::post('/updateMatiere/{id}', 'MatiereControler@ActionupdatMatiere')->name('updateMatiere');
Route::post('ModifierExamen', 'ExamenController@ModifierExam')->name('ModifierExam');
//route class
Route::get('listClass', 'ClassController@listClass');
Route::get('AjouterClass', 'ClassController@AjouterClass');
Route::post('addClass', 'ClassController@addClass')->name('addClass');
// Route::get('ListClassProf', 'ClassController@listClassProf');      
      
//templet eleve
Route::get('mes_Examen', function () {
    if(Session::has('IdFiliere')) 
    {
        $IdFiliere=Session::get('IdFiliere');
        $examens=Examen::select('examens.*')
        ->join('filieres','examens.filiere','filieres.id')
        ->where('filieres.id',$IdFiliere)
        ->get();
        return view("fullcalendar.views.mesExamen",compact('examens'));
    }
});



Route::get('register', 'LoginController@register');
Route::post('registrer', 'LoginController@addUser');
Route::post('checkLogin', 'LoginController@checkLogin')->name('checkLogin');
Route::get('mon_programme', 'LoginController@succelogin');

//programe éléve:


Route::get('/load-events/{class}/{id}', 'EventController@loadEvents')->name('routeLoadEvents');
Route::get('load-events-student', 'EventController@loadEventStudent')->name('LoadEventsStudent');

Route::put('event-update', 'EventController@update')->name('routeEventUpdate');

Route::post('event-store', 'EventController@store')->name('routeEventStore');

Route::delete('event-destroy', 'EventController@destroy')->name('routeEventDelete');


/**
 * Rotas para Eventos Rápidos
 */
Route::delete('fast-event-destroy', 'FastEventController@destroy')->name('routeFastEventDelete');

Route::put('fast-event-update', 'FastEventController@update')->name('routeFastEventUpdate');

Route::post('/fast-event-store', 'FastEventController@store')->name('routeFastEventStore');

// front office
    //examen
Route::get('mediaExamen/{id}', 'ExamenController@mediaExamen');
Route::post('sendExamen', 'ExamenController@sendExamen')->name('sendExamen');
Route::get('affectationProfClass', 'LignClassProf@affectationProfClass');
Route::post('classProf', 'LignClassProf@classProf')->name('classProf');
Route::post('filiere', function (Request $request) {
    if($request->idNiveau){
        $filieres=Filiere::where('niveauScolaire',$request->idNiveau)->get();
        $outpout='<option disabled="" value="" selected="">Choisir Niveau</option>';
        foreach($filieres as $filiere)
        {
            $outpout.='<option value="'.$filiere->id.'">'.$filiere->nomFiliere.'</option>';
        }
        return $outpout ;
    } 
    if($request->niveauEtude){
        $Classfilieres=Filiere::select('classes.*')->join('classes','classes.filiere','filieres.id')
        ->where('filiere',$request->niveauEtude)
        ->get();
        $outfiliere='<option disabled="" value="" selected="">Choisir class</option>';
        foreach($Classfilieres as $CF)
        {
            $outfiliere.='<option value="'.$CF->id.'">'.$CF->nom_class.'</option>';
        }
        return $outfiliere ;
    } 
})->name('filiere');
Route::post('filiereProf', function (Request $request) {
if($request->filiere){
     
    $prof=Professeur::select('professeurs.*')
    ->join('matieres','matieres.id','professeurs.matiere')
    ->join('filieres','filieres.id','matieres.mfiliere')
    ->where('filieres.id',$request->filiere)
    ->get();
    $outfiliere='<option disabled="" value="" selected="">Choisir Prof</option>';
    foreach($prof as $p)
    {
        $outfiliere.='<option value="'.$p->id.'">'.$p->name.' '.$p->prenom .'</option>';
    }
    return $outfiliere ;
 }
})->name('filiereProf');
Route::post('tableEtudiant','EtudiantController@tableEtudiant')->name('tableEtudiant');
Route::post('affectProfClass', )->name('affectProfClass'); 

Route::get('listLive/{class}/{id}','ClassController@listLive');
Route::post('envoyer','Auth\ForgotPasswordController@envoyer')->name('send');

//prof
Route::get('listProf','ProfController@listProf');
Route::get('AjouterProf','ProfController@addProf');
Route::post('addProf', 'ProfController@store')->name('addProf');

// listControles
Route::get('archiveControle','ControlesController@archiveControle');
Route::get('listControles','ControlesController@listControles');
Route::get('listReponseControles','ControlesController@listReponseControles');
Route::get('addControle','ControlesController@addControle');
Route::post('ProfClass', function (Request $request) {
if($request->prof){
    $ligneprof=LigneClassProf::select('classes.*')
    ->join('classes','classes.id','ligne_class_profs.class')
    ->where('Prof',$request->prof)->get();     
    $outclass='<option disabled="" value="" selected="">Choisir class</option>';
    foreach($ligneprof as $ligne)
    {
        $outclass.='<option value="'.$ligne->id.'">'.$ligne->nom_class.'</option>';
    }
    $profs=Professeur::select('professeurs.*','matieres.nomMatiere')
    ->join('matieres','matieres.id','professeurs.matiere')
    ->where("professeurs.id",$request->prof)->first();
    $outprof='<option value="'.$profs->id.'">'.$profs->nomMatiere.'</option>';
    return json_encode(
    array("var1" => $outclass,"var2" => $outprof));
 }

})->name('ProfClass');
Route::post('uploadControle', 'ControlesController@uploadControle')->name('uploadControle');
Route::get('mes_controles', function () {
    $filiere=Session::get('filiere');
    $matieres=Matiere::join('filieres','matieres.mfiliere','filieres.id')->where('nomFiliere',$filiere)->get();
    $controles=Controle::select('controles.*','matieres.nomMatiere')
    ->join('matieres','matieres.id','controles.matiere')
    ->join('ligne_class_profs','ligne_class_profs.id','controles.lign_class_prof')
    ->where('ligne_class_profs.Class',Session::has('classEtudiant'))
    ->get();
    return view("fullcalendar.views.mesControles",compact('matieres','controles'));
    });
Route::get('ControleMedia/{id}',function ($id) {
        $controles=Controle::where('id',$id)->first();
         return view("eleve.ControleMedia",compact('controles')); 
    });
Route::get('ModifierControle/{id}', 'LignClassProf@ModifierControle');
 Route::post('changeClassProf', function (Request $Request) {
    $LigneClassProf =LigneClassProf::find($Request->id);
    $LigneClassProf->Prof=$Request->prof;
    $LigneClassProf->save();
    return redirect('affectationProfClass');
 })->name('changeClassProf');
 Route::get('ModifierClass/{id}', 'ClassController@UpdateClass'); 
 Route::post('ModifierNomClass', 'ClassController@modifierNomClass')->name('ModifierNomClass');

 Route::post('sendControle', 'ControlesController@sendControle')->name('sendControle');
 Route::get('Félicitations',function () {
    
     return view("eleve.insertionSucce"); 
});
Route::get('listReclamationProf',function () {
    $events=DB::table('events')->where('etat',0)->count(); 
    Session::put('cntEvent', $events);
     return view("admin.listReclamationProf"); 
});

//login parent

Route::get('login_parents', function (Request $request) { 
    $request->session()->forget('idprof');
    $request->session()->forget('idAdmin');
    $request->session()->forget('idParent');
    return view("security.login_parent");});
Route::post('checkLoginParent', 'LoginController@checkLoginParent')->name('checkLoginParent');







