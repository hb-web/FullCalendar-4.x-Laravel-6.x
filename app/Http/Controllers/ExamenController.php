<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Examen;
use App\Filiere;
use App\LigneClassProf;
use App\Professeur;
use App\ReponseExamen;
use App\User;
use DB;
use Session;
class ExamenController extends Controller
{ 
    public function index()
    {
        if(Session::has('idprof')){
        $examens=Examen::select('examens.*','filieres.nomFiliere')
        ->join('professeurs','professeurs.id','examens.prof')
        ->join('filieres','filieres.id','examens.filiere')
        ->where(['prof'=>Session::get('idprof'),'examens.etat' => 1])->get(); 
      
        
        }else{
            $examens=Examen::select('examens.*','filieres.nomFiliere')
            ->join('professeurs','professeurs.id','examens.prof')
            ->join('filieres','filieres.id','examens.filiere')
            ->where('examens.etat',1)->get();
        }
        return view("admin.listExamen",compact('examens'));
    }
    public function corectionExam()
    {
        
        $examens=Examen::select('examens.*')->join('professeurs','professeurs.id','examens.prof')
        ->where(['prof'=>Session::get('idprof'),'etat' => 1])->get(); 
      
        return view("admin.listExamen",compact('examens'));

    }
    public function AjouterExamens()
    {     
        if(Session::has('idprof'))
        {
            $idprof=Session::get('idprof');
            $filiere=LigneClassProf::select('filieres.id','nomFiliere')
            ->join('Classes','classes.id','ligne_class_profs.Class')
            ->join('filieres','filieres.id','classes.filiere')
            ->where('ligne_class_profs.Prof',$idprof)
            ->get();
            return view("admin.addExamen",compact('filiere'));
        }else{ 
            $filiere=Filiere::select('filieres.id','nomFiliere') 
            ->get();
            return view("admin.addExamen",compact('filiere'));
        }
    }
    
    public function addExamens(Request $request)
    {     
        $idprof=Session::get('idprof');
         $Examen = new Examen([
            'nom_exam'    => $request->exam ,
            'filiere'    => $request->filiere ,
            'prof'     =>  $idprof,
            'type_exam'     =>  $request->type
        ]);

        $Examen->save();
        return redirect('AjouterExamens');
    }
  public function formuleReExamen()
    {     
        
        return view('admin.formuleReExamen');
    }
    function uploadExam(Request $request)
    {   
      
        //  PDF
        if($request->PDF)
        {
            $pdf = $request->file('PDF');
            $nom_pdf = $pdf->getClientOriginalName();
            $pdf->move(public_path('assets/upload/Examens/exam'), $nom_pdf);
            
        } else{
            $nom_pdf='null';
        }     
        //  solution exam
        if($request->solution)
        {
            $solution = $request->file('solution');
            $nom_solution = $solution->getClientOriginalName();
            $solution->move(public_path('assets/upload/Examens/solution'), $nom_solution);
           
           
        } else{
            $nom_solution='null';
        } 
        if(Session::has('idprof'))
        {
            $prof=Session::get('idprof');
        }else{
            $prof=$request->prof;
        }
        
        $Examen = new Examen([
            'nom_exam'    => $request->nomExam,
            'filiere'    => $request->filiere,
            'description_exam'     =>  $request->description,
            'prof'     =>  $prof,
            'file_exam'     =>  $nom_pdf,
            'file_corection'     =>  $nom_solution 
        ]);

        $Examen->save();
        $output = array(
            'success' => 'Cour et inserer avec succès'
             );
     
       return $output;
    }
public function ListArchiveExamen()
    {
        $examens=Examen::select('examens.*')->join('professeurs','professeurs.id','examens.prof')
        ->where(['prof'=>Session::get('idprof'),'etat' => 0])->get(); 
        return view("admin.archiveExamen",compact('examens'));

    }
    public function ArchiveExamen($id)
    {
        $Examen = Examen::find($id);

        $Examen->etat=0;

        $Examen->save();
        return redirect('les_Archives_Examen');
    }
    public function desarchiverExamen($id)
    {
        $Examen = Examen::find($id);

        $Examen->etat=1;

        $Examen->save();
        return redirect('listExamens');
    }
    public function delateExamen ($id)
    {
        Examen::find($id)->delete();
         
        return redirect('les_Archives_Examen');
    }
    public function updatExamen($id)
    {  

        $Examen = Examen::where(['id'=>$id,'prof'=>Session::get('idprof')])->first();
      
        if($Examen){

            return view("admin.updateExamen",compact('Examen','id'));
        }else{
            echo "Examen n'exist pas";
        }
        
      
    } 
    public function classNiveau($nom,$idFiliere)
    { 
        if(Session::get('idprof')){
            $prof=Session::get('idprof');
            $classes=LigneClassProf::select('classes.*')
            ->join('classes','classes.id','ligne_class_profs.Class')
            ->where(['classes.filiere'=>$idFiliere,'ligne_class_profs.Prof'=>$prof])
            ->get();
            
            return view('admin.listClassNiveau',compact('classes','nom'));
        }else{
            echo 'coming soon';
        }
        
    }

    public function travailEtudiant(Request $request)
    { 
        if($request->id)
        {
             
        $idClass=$request->id;
       
        $prof=Session::get('idprof');

        $eleve = DB::select("SELECT users.name,users.prenom,travail_etudiant FROM `users` 
        join classes on classes.id=users.id_class join ligne_class_profs on classes.id=ligne_class_profs.Class 
        left JOIN reponse_examens on reponse_examens.Eleve=users.id 
        left JOIN examens on examens.id=reponse_examens.Exam 
        where ligne_class_profs.Prof=$prof and ligne_class_profs.Class=$idClass");
      
        
        return response()->json($eleve);
        }
      
    } 
    
public function ModifierExam (Request $request)
{   

    $prof=Session::get('idprof');
    $Examen = Examen::find($request->id);
    $Examen->nom_exam = $request->nomExam;
    $Examen->description_exam = $request->description;
    $Examen->prof = $prof;

    //  PDF
    if($request->PDF)
    {
        $pdf = $request->file('PDF');
        $nom_pdf = $pdf->getClientOriginalName();
        $pdf->move(public_path('assets/upload/Examens/exam'), $nom_pdf);  
        $Examen->file_exam = $nom_pdf;
    }      
    //  solution exam
    if($request->solution)
    {
        $solution = $request->file('solution');
        $nom_solution = $solution->getClientOriginalName();
        $solution->move(public_path('assets/upload/Examens/solution'), $nom_solution);  
        $Examen->file_corection = $nom_solution;
    }  


    $Examen->save();

    $output = array(
        'success' => 'Examen et modifier avec succès'
         );
 
   return $output;
}

public function mediaExamen($id)
    {  

        $prof=Professeur::select('professeurs.*')->join('ligne_class_profs','ligne_class_profs.Prof','professeurs.id')
        ->where('ligne_class_profs.Class',Session::get('classEtudiant'))
        ->first();

         
        $Examen=Examen::where(['id'=>$id,'prof'=>$prof->id])->first();
 
       
        if($Examen)
        {
         return view("eleve.mediaExamen",compact('Examen'));   
        }else{
            echo "cette examen n'exist pas";
        }
      
    }
    public function sendExamen(Request $request)
    {
        $idUser=Session::get('idUser');
        $verifRep=ReponseExamen::where(['Exam'=>$request->id])->first();
        if($verifRep)
        {
            echo 'Vous avez déjà répondu dans cette examen ';
        }else{ 
            if($request->PDF)
            {
            $pdf = $request->file('PDF');
            $nom_pdf = $pdf->getClientOriginalName();
            $pdf->move(public_path('assets/upload/Examens/reponce_Etudiant/'), $nom_pdf);  
            

        
            
            ReponseExamen::create(['Eleve'    => $idUser,
            'Exam'     =>  $request->id,
            'travail_etudiant'     =>  $nom_pdf]);
            return redirect('Félicitations');
            } 
        }
    }
    
}