<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Filiere;
use App\Matiere;
use App\NiveauScolaire;
use App\Professeur;
use App\LigneClassProf;
use DB; 
class LignClassProf extends Controller
{
    public function affectationProfClass(Request $request)
    {
     
        if(Session::get('idAdmin'))
            {
                $filieres=Filiere::select('classes.*','filieres.nomFiliere')
                ->join('classes','classes.filiere','filieres.id')->orderBy('classes.id', 'DESC')->paginate(5);
                $niveau=NiveauScolaire::all();
                $classProf=Matiere::select('ligne_class_profs.id','classes.nom_class','professeurs.name','professeurs.prenom','matieres.nomMatiere')
                ->join('professeurs','professeurs.matiere','matieres.id')
                ->join('ligne_class_profs','ligne_class_profs.Prof','professeurs.id')
                ->join('classes','ligne_class_profs.Class','classes.id')
                ->orderBy('ligne_class_profs.id', 'DESC')->paginate(6);
                $FiliereClass=Filiere::select('filieres.*')
                ->join('classes','classes.filiere','filieres.id')
                ->groupBy('id')->get();
                $prof=Professeur::all();
                return view('admin.affectationProfClass',compact('filieres','FiliereClass','niveau','classProf','prof'));
            }
    }

    public function classProf(Request $request)
    {
        DB::select("insert into classes (`nom_class`,`filiere`) values ('$request->name','$request->filiere')");
        return redirect("affectationProfClass");
    }

    public function affectProfClass(Request $request)
    {     
        
         
         $prof = new LigneClassProf([
            'Prof'    => $request->Professeur ,
            'Class'    => $request->class  
        ]);

        $prof->save();
        return redirect('affectationProfClass');
    }
    public function ModifierControle($id)
    {
        $ligneClassProf=LigneClassProf::select('ligne_class_profs.id','classes.nom_class','ligne_class_profs.Prof')
        ->join('professeurs','professeurs.id','ligne_class_profs.Prof')
        ->join('classes','classes.id','ligne_class_profs.Class')
        ->where('ligne_class_profs.id',$id)->first();
        $profs=Professeur::all();
        // print_r($ligneClassProf);
    //    print_r($ligneClassProf->Class);
        return view('admin.updateAfectationProf',compact('ligneClassProf','profs'));
    }
}
