<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cour;
use App\Event;
use App\HistoriqueLive;
use App\live;
use App\Matiere;
use App\Professeur;
use Session; 
class CourController extends Controller
{
    public function index()
    {
        if(Session::has('idprof'))
        {

        $cours=Cour::where(['matiere'=>Session::get('matiere'),'etat'=> 1])
        ->orderByDesc('cours.id')->paginate(5);  
        return view("admin.listCours",compact('cours'));
        }else{
            $cours=Cour::select('cours.*','professeurs.name','professeurs.prenom')
            ->join('professeurs','cours.prof','professeurs.id')
            ->orderByDesc('cours.id')->paginate(5);
            return view("admin.listCours",compact('cours'));
        }

    }
    public function ListArchiveCours()
    {
        $cours=Cour::where(['matiere'=>Session::get('matiere'),'etat'=> 0])
        ->orderByDesc('cours.id')->get(); 
        return view("admin.archiveCours",compact('cours'));

    }
    public function ArchiveCours($id)
    {
        $Cours = Cour::where('id',$id)->first();

        $Cours->etat=0;

        $Cours->save();
        return redirect('les_Archives_Cours');
    }
    public function désarchiver($id)
    {
        $Cours = Cour::where('id',$id)->first();
        $Cours->etat=1;
        $Cours->save();
        return redirect('listCours');
    }
    public function delate($id)
    {
        Cour::where('id', $id)->delete();
         
        return redirect('les_Archives_Cours');
    }

    public function addCours()
    {
        $profs=Professeur::all(); 
        return view("admin.addCours",compact('profs'));
        
    }
    function upload(Request $request)
    {   
       
        //  PDF
        if($request->PDF)
        {
            $pdf = $request->file('PDF');
            $nom_pdf = $pdf->getClientOriginalName();
            $pdf->move(public_path('assets/upload/cours'), $nom_pdf);
        } else{
            $nom_pdf='null';
        }     
        //  video
        if($request->video)
        {
            $typevideo="Upload";
            $video = $request->file('video');
            $nom_video = $video->getClientOriginalName();
            $video->move(public_path('assets/upload/videos'), $nom_video);
        } else{
            if($request->videoYoutube)
            {
                $typevideo="Youtube";
                $nom_video=$request->videoYoutube;
            }else{
              $nom_video='null';  
              $typevideo='null'; 
            }
            
        }
        if(Session::has('matiere'))
        {
            $matiere=Session::get('matiere');
        }else{ 
                $prof=Professeur::where('professeurs.id',$request->prof)->first();
                $matiere=$prof->matiere;
        } 
         $cours = new Cour([
            'nomCour'    => $request->cours,
            'description'     =>  $request->description,
            'PDF'     =>  $nom_pdf,
            'typeVideo'     =>  $typevideo,
            'video'     =>  $nom_video,
            'matiere'     =>  $matiere ,
            'prof' => $request->prof
        ]); 
        $cours->save();
        $output = array('success' => 'Cour et inserer avec succès');
     
       return $output;
    }
    
    public function updatCour($id)
    {
            $Cours = Cour::find($id);
            return view("admin.updateCours",compact('Cours')); 
      
        
    } 
public function ActionupdatCours(Request $request,$id)
    {
        $output = array(
            'success' => 'Cour '.$request->cours.' est modifier avec succès',
             );
        $cours = Cour::find($id);
        $cours->nomCour = $request->cours;
        $cours->description = $request->description;
        if($request->PDF){    
            $pdf = $request->file('PDF');
            $nom_pdf = $pdf->getClientOriginalName();
            $pdf->move(public_path('assets/upload/cours'), $nom_pdf);   
            $cours->PDF = $nom_pdf;
         } 
        if($request->video){     
            $video = $request->file('video');
            $nom_video = $video->getClientOriginalName();
            $video->move(public_path('assets/upload/videos'), $nom_video);  
            $cours->video = $nom_video;
        } 
        
        
        $cours->save();
        return $output;

        
        
    }
    
    public function courEvent($id)
    {
        if(Session::has('idUser'))
        {
            $event=Event::where('id',$id)->first();
            if($event->type_event=='document')
            {
                $cours=Cour::where('id',$event->cour)->first();
                return view("eleve.mediaCours",compact('cours'));
            }else{
                    $lives=live::where('id',$event->cour)->first();
                if(!$lives)
                {
                    echo 'pas de réunion';
                }else{
                        $idUser=Session::get('idUser');
                        $HistoriqueLive = new HistoriqueLive([
                            'eleve'    => $idUser,
                            'live' => $lives->id
                        ]);
                        $HistoriqueLive->save();
                        return redirect($lives->CodeSalle); 
                    }  
                }
        }

    } 





    
}
