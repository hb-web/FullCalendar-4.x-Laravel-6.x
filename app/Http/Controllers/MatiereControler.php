<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matiere; 
use App\Filiere; 
use Session;
class MatiereControler extends Controller
{
    public function index()
    {

        $matiere=Matiere::select("matieres.*",'filieres.nomFiliere')
        ->join("filieres","matieres.mfiliere","filieres.id")
        ->where('matieres.etat',1)->paginate(5);  
        return view("admin.listMatiere",compact('matiere'));

    }
    public function AjouterMatiere()
    {
        $filieres=Filiere ::all();
        return view("admin.addMatiere",compact('filieres')); 

    }
     
    public function updatMatiere($id)
    {
        $matieres = Matiere::find($id);
        $filieres=Filiere ::all();     
        return view("admin.updateMatiere",compact('filieres','matieres')); 
    } 
    public function ActionupdatMatiere(Request $request,$id)
    {
        $student = Matiere::find($id);
        $student->nomMatiere = $request->matiere;
        $student->mfiliere = $request->filiere;
        $msg='';
        if($request->file)
        {
             
            $image = $request->file;
            $new_name = $image->getClientOriginalName();
            $image->move(public_path('assets/upload/matiere'), $new_name); 
            $student->photoMat = $new_name;
            $msg='<img src="http://127.0.0.1:8000/assets/upload/matiere/'.$new_name.'" class="img-thumbnail" style="height: 200px;"/>';
            
        }
        
        $output = array(
            'success' => 'Matiere est modifier avec succès',
            'image'  =>  $msg
            );
        
        $student->save();
        return $output;
    }
    public function ListArchiveMatiere()
    {
        $matiere=Matiere::select("matieres.*",'filieres.nomFiliere')
        ->join("filieres","matieres.mfiliere","filieres.id")
        ->where('matieres.etat',0)->paginate(5);  
        return view("admin.archiveMatiere",compact('matiere'));

    }
    public function ArchiveMatiere($id)
    {
        $Matiere = Matiere::where('id',$id)->first();
        $Matiere->etat=0;
        $Matiere->save();
        return redirect('les_Archives_Matiere');
    }
    public function désarchiverMatiere($id)
    {
        $Matiere = Matiere::where('id',$id)->first();
        $Matiere->etat=1;
        $Matiere->save();
        return redirect('listMatiere');
    }
    public function delateMatiere($id)
    {
        Matiere::where('id', $id)->delete();
         
        return redirect('les_Archives_Matiere');
    }
    function upload(Request $request)
    {
        $rules = array(
        'file'  => 'required|image|max:2048'
        );
        $image = $request->file('file');
        $new_name = $image->getClientOriginalName();
        $image->move(public_path('assets/upload/matiere'), $new_name);
        $output = array(
            'success' => 'Image est téléchargée avec succès',
            'image'  => '<img src="assets/upload/matiere/'.$new_name.'" class="img-thumbnail" style="height: 200px;"/>'
            );
         $student = new Matiere([
            'nomMatiere'    => $request->matiere,
            'photoMat'     =>  $new_name,
            'mfiliere'     =>   $request->filiere
        ]);
        $student->save();
        return $output;
    }
}
