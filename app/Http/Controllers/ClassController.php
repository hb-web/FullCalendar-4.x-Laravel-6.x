<?php

namespace App\Http\Controllers;

use App\Filiere;
use Illuminate\Http\Request;
use App\LigneClassProf;
use App\User;
use Session;
use DB;
class ClassController extends Controller
{
    public function listClass(Request $request)
    {
        if(Session::get('idprof'))
        {  
        $class= LigneClassProf::select('ligne_class_profs.id as idClass','classes.id as class','classes.nom_class','filieres.nomFiliere')
        ->join('classes','classes.id','ligne_class_profs.Class')
        ->join('filieres','filieres.id','classes.filiere')
        ->where('Prof',Session::get('idprof'))
        ->get(); 
        return view("admin.listClass",compact('class'));
        }else{
            if(Session::get('idAdmin'))
            {
                $class= LigneClassProf::select('ligne_class_profs.id as idClass','classes.id as class','classes.nom_class','filieres.nomFiliere','professeurs.name','professeurs.prenom')
                ->join('professeurs','professeurs.id','ligne_class_profs.Prof')
                ->join('classes','classes.id','ligne_class_profs.Class')
                ->join('filieres','filieres.id','classes.filiere')->get(); 
                
                return view("admin.listClass",compact('class')); 
            }
        }
    }
    public function AjouterClass(Request $request)
    {
        $filiere=Filiere::all();
         return view("admin.addClass",compact('filiere'));
    }
    public function addClass(Request $request)
    {
        DB::select("insert into classes (`nom_class`,`filiere`) values ('$request->nom','$request->filiere')");
        return redirect("listClass");
    }

    public function mesEleve(Request $request,$idClass)
    {
       
        if(Session::get('idprof'))
        {
            $prof=Session::get('idprof');

        $eleve = DB::select("SELECT users.name,users.prenom,classes.nom_class,nom_exam,travail_etudiant FROM `users` join classes on classes.id=users.id_class join ligne_class_profs on classes.id=ligne_class_profs.Class left JOIN reponse_examens on reponse_examens.Eleve=users.id left JOIN examens on examens.id=reponse_examens.Exam where ligne_class_profs.Prof=$prof and ligne_class_profs.Class=$idClass");
      
        // if($Examen){

            return view("admin.mesEleve",compact('eleve'));
        // }else{
        //     echo "Examen n'exist pas";
        // }
        }
    }

    public function listClassProf(Request $request)
    {
        $class=DB::select('SELECT filieres.nomFiliere,classes.nom_class, professeurs.name ,professeurs.prenom FROM `ligne_class_profs` join professeurs on professeurs.id=ligne_class_profs.Prof join classes on classes.id=ligne_class_profs.Class join filieres on filieres.id=classes.filiere');        
        print_r($class);
        // return view("admin.listClassProf",compact('class'));
    }

    public function listLive($class,$idClass)
    {
        $lists=User::select('name','prenom','nomSalle','historique_lives.created_at as date_creation')
        ->where('id_class',$idClass)
        ->leftjoin('historique_lives','historique_lives.eleve','users.id')
        ->leftjoin('lives','historique_lives.live','lives.id')
        ->get();
        
        // if(count($list) > 0)
        // {

            return view('admin.listHistoriqueEtudiant',compact('lists'));
        // }else{
        //     echo "pas d'étudiant";
        // }
    }
    public function UpdateClass($id){
        $class =DB::table('classes')->find($id);
        $filieres=Filiere::all();
        return view('admin.UpdateClass',compact('class','filieres'));
       
    }
    public function modifierNomClass(Request $Request){
        DB::table('classes')->where('id',$Request->id)
        ->update(['nom_class' => $Request->nom,'filiere' => $Request->filiere]);
         
        return redirect('affectationProfClass');
    }

}
