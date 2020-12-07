<?php

namespace App\Http\Controllers;

use App\Controle;
use App\LigneClassProf;
use App\Professeur;
use App\ReponseControle;
use Session;
use Illuminate\Http\Request;

class ControlesController extends Controller
{
    public function listControles()
    {
        $controles=Controle::select('controles.*','professeurs.name','professeurs.prenom','classes.nom_class','matieres.nomMatiere')
        ->join('ligne_class_profs','ligne_class_profs.id','controles.lign_class_prof')
        ->join('professeurs','professeurs.id','ligne_class_profs.Prof')
        ->join('classes','classes.id','ligne_class_profs.Class')
        ->join('matieres','matieres.id','controles.matiere')
        ->where('controles.etat',1)
        ->get();
        return view('admin.listControle',compact('controles'));
    }
    public function listReponseControles()
    {
        $controles=ReponseControle::select('reponse_controles.*','users.name','users.prenom','nomControle')
        ->join('users','users.id','reponse_controles.Eleve')
        ->join('controles','controles.id','reponse_controles.controle')
        ->get();
        return view('admin.listReponseControle',compact('controles'));
    }
    public function addControle()
    {
        $prof=Professeur::all();
        if(Session::has('idprof')){
            $class=LigneClassProf::select('classes.*')
            ->join('professeurs','professeurs.id','ligne_class_profs.Prof')
            ->join('classes','classes.id','ligne_class_profs.Class')
            ->where('ligne_class_profs.Prof',Session::get('idprof'))
            ->get();
            return view('admin.addControle',compact('prof',"class"));
        }else{
            return view('admin.addControle',compact('prof'));
        }
    }
    function uploadControle(Request $request)
    {   
    
        //  PDF
        if($request->PDF)
        {
            $pdf = $request->file('PDF');
            $nom_pdf = $pdf->getClientOriginalName();
            $pdf->move(public_path('assets/upload/controles/exam'), $nom_pdf);
            
        } else{
            $nom_pdf='null';
        }     
        //  solution exam
        if($request->solution)
        {
            $solution = $request->file('solution');
            $nom_solution = $solution->getClientOriginalName();
            $solution->move(public_path('assets/upload/controles/solution'), $nom_solution);
           
        } else{
            $nom_solution='null';
        }
        
            

        if(Session::has('idprof'))
        {
            $prof=Session::get('idprof');
            $matiere=Session::get('matiere');
        }else{
            $prof=$request->prof;
            $matiere=$request->matiere;
        }
        
        $lign_class_prof=LigneClassProf::where(['Prof'=>$prof,'class'=>$request->class])->first();
         
         
 
        if($lign_class_prof->id)
        { 
        $controle = new Controle([
            'nomControle'       =>  $request->nomControle,
            'controle_PDF'      =>  $nom_pdf,
            'solution_PDF'      =>  $nom_solution,
            'lign_class_prof'   =>  $lign_class_prof->id,
            'matiere'           =>  $matiere,
            'description'       =>  $request->description 
        ]);

        $controle->save();
        $output = array(
            'success' => 'Cour et inserer avec succès'
             );
        }else{
            $output='ereur veuillez choisir le prof et sa class';
        }
       return $output;
    }


    public function archiveControle()
    {
        $controles=Controle::select('controles.*','professeurs.name','professeurs.prenom','classes.nom_class','matieres.nomMatiere')
        ->join('ligne_class_profs','ligne_class_profs.id','controles.lign_class_prof')
        ->join('professeurs','professeurs.id','ligne_class_profs.Prof')
        ->join('classes','classes.id','ligne_class_profs.Class')
        ->join('matieres','matieres.id','controles.matiere')
        ->where('controles.etat',0)
        ->get();
        return view('admin.archiveControles',compact('controles'));
    }

    public function sendControle(Request $request)
    {
        if(Session::has('idUser'))
        {
            $idUser=Session::get('idUser');
            $verifRep=ReponseControle::where(['controle'=>$request->id])->first();
            if($verifRep)
            {
                echo 'Vous avez déjà répondu dans cette examen ';
            }else{ 
                if($request->PDF)
                {
                $pdf = $request->file('PDF');
                $nom_pdf = $pdf->getClientOriginalName();
                $pdf->move(public_path('assets/upload/controles/reponce_Etudiant/'), $nom_pdf);  
                

            
                $ReponseControle = new ReponseControle([
                    'Eleve'    => $idUser,
                    'controle'     =>  $request->id,
                    'travail_etudiant'     =>  $nom_pdf
                ]);
                $ReponseControle->save();
                
                return redirect('Félicitations');
                } 
            }
            
                
        }
    }
    
}
