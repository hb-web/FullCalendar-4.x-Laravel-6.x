<?php

namespace App\Http\Controllers;

use App\Filiere;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;


class EtudiantController extends Controller
{
    public function addEtudiant(Request $request)
    {
        $FiliereClass=Filiere::select('filieres.*')
                ->join('classes','classes.filiere','filieres.id')
                ->groupBy('id')
                ->get();
       return view('admin.addEtudiant',compact('FiliereClass'));
    }
    public function ajouterEtudiant(Request $request)
    { 
        $length = 16;
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random= substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
        $email=$request->nom.''.$request->prenom.'@ecole.com';
        
        $pass = Hash::make($random);
        $EmailUser=User::where('email',$email)->first();
        if($EmailUser){      
           return Redirect::back()->withErrors(['votre nom et prénom deja exist veuillez le verifier', 'The Message']);
        }else{

            if($request->image)
            {
                $image = $request->file('image');
                $nom_image = $image->getClientOriginalName();
                $image->move(public_path('assets/upload/profile/etudiants/'), $nom_image);
                
            } else{
                $nom_image='null';
            }

        $user = new User([
            'avatar' => $nom_image,
            'name'    => $request->nom ,
            'prenom'    => $request->prenom ,
            'email'    => $email ,
            'télé'    => $request->tel ,
            'id_class'    => $request->class ,
            'filiere'    => $request->niveauEtude ,            
            'vraiPassword'    => $random ,
            'password'    => $pass  
        ]);
        $user->save();
        $output = array(
            'success' => 'un étudiant inserer avec succès'
             );
             return $output;
          
        }
    }
    
    public function listEtudiant(Request $request)
    {
        if(Session::has('idprof'))
        {
            $eleves=User::select('users.*','classes.nom_class','filieres.nomFiliere')
            ->join('filieres','filieres.id','users.filiere')
            ->join('classes','classes.id','users.id_class')
            ->join('ligne_class_profs','ligne_class_profs.Class','classes.id')
            ->where('ligne_class_profs.Prof',Session::get('idprof'))
            ->orderBy('id', 'DESC')->paginate(5);
            $FiliereClass=Filiere::select('filieres.*')
                    ->join('classes','classes.filiere','filieres.id')
                    ->join('ligne_class_profs','ligne_class_profs.Class','classes.id')
                    ->where('ligne_class_profs.Prof',Session::get('idprof'))
                    ->groupBy('id')
                    ->get();
            return view('admin.listEtudiant',compact('eleves','FiliereClass'));

        }else{
            if(Session::has('idAdmin')){
                $eleves=User::select('users.*','classes.nom_class','filieres.nomFiliere')
                ->join('filieres','filieres.id','users.filiere')
                ->join('classes','classes.id','users.id_class')
                // ->join('ligne_class_profs','ligne_class_profs.Class','classes.id')
                ->orderBy('id', 'DESC')->paginate(5);
                $FiliereClass=Filiere::select('filieres.*')
                ->join('classes','classes.filiere','filieres.id')
                ->groupBy('id')
                ->get();
                return view('admin.listEtudiant',compact('eleves','FiliereClass'));
            }


            // return redirect('login_prof');
        }
    }

    public function listInscrivant(Request $request)
    {
        if(Session::has('idprof'))
        {
            $eleves=User::select('users.*','classes.nom_class','filieres.nomFiliere')
            ->join('filieres','filieres.id','users.filiere')
            ->join('classes','classes.id','users.id_class')
            ->join('ligne_class_profs','ligne_class_profs.Class','classes.id')
            ->where('ligne_class_profs.Prof',Session::get('idprof'))
            ->orderBy('id', 'DESC')->paginate(5);
            $FiliereClass=Filiere::select('filieres.*')
                    ->join('classes','classes.filiere','filieres.id')
                    ->join('ligne_class_profs','ligne_class_profs.Class','classes.id')
                    ->where('ligne_class_profs.Prof',Session::get('idprof'))
                    ->groupBy('id')
                    ->get();
            return view('admin.listEtudiant',compact('eleves','FiliereClass'));

        }else{
            if(Session::has('idAdmin')){
                $eleves=User::select('users.*','classes.nom_class','filieres.nomFiliere')
                ->leftjoin('filieres','filieres.id','users.filiere')
                ->leftjoin('classes','classes.id','users.id_class')
                ->leftjoin('ligne_class_profs','ligne_class_profs.Class','classes.id')
                ->where('classes.id',null)
                ->orderBy('id', 'DESC')->paginate(5);
                $FiliereClass=Filiere::select('filieres.*')
                ->join('classes','classes.filiere','filieres.id')
                ->groupBy('id')
                ->get();
                return view('admin.listInscrivant',compact('eleves','FiliereClass'));
            }


            return redirect('login_prof');
        }
    }
    public function archiveEtudiant($id)
    {
        $users = User::find($id);

        $users->etat=0;

        $users->save();
        return redirect('ListArchiveEtudiant');
    }
    public function DéarchiveEtudiant($id)
    {
        $users = User::find($id);

        $users->etat=1;
        $users->save();
        
        if($users->id_class==null)
        {
            return redirect('listInscrivant');
        }else{
            return redirect('listEtudiant'); 
        }
       
    }
    public function ListArchiveEtudiant()
    {
        $Etudiants=User::where('etat',0)->orderBy('id', 'DESC')->paginate(5);
        
         return view('admin.archiveEtudiant',compact('Etudiants'));
    }
    public function ModifierEtudiant($id)
    {
        $users=User::find($id);
        $FiliereClass=Filiere::select('filieres.*')
                ->join('classes','classes.filiere','filieres.id')
                ->groupBy('id')
                ->get();
        $Class=DB::select('select * from classes');
        return view('admin.updateEtudiant',compact('users','FiliereClass','Class'));
    }
    public function updateEtudiant (Request $request,$id)
    {
        $Users = User::find($id);
        $Users->name = $request->nom;
        $Users->prenom = $request->prenom;
        $EmailUser=User::where(['email'=>$request->email,'etat' =>1])->first();
        
        if(!$EmailUser){
            $Users->email = $request->email;  
        }  
        $Users->télé = $request->tel;
        $Users->id_class = $request->class;
        $Users->filiere = $request->niveauEtude;
        $Users->save();
        return redirect('listEtudiant'); 
    }
    public function tableEtudiant(Request $request)
    {
        $outpout="";
        if(Session::has('idprof'))
        {
            $eleves=User::select('users.*','classes.nom_class','filieres.nomFiliere')
            ->join('filieres','filieres.id','users.filiere')
            ->join('classes','classes.id','users.id_class')
            ->join('ligne_class_profs','ligne_class_profs.Class','classes.id')
            ->where(['ligne_class_profs.Prof'=>Session::get('idprof'),'classes.id'=> $request->idclass])
            ->orderBy('id', 'DESC')->get();
            
            if(count($eleves)>0){
                foreach($eleves as $elv)
                {
                    $outpout.='<tr><td class="tc-center"><label><b>'.$elv->name.' '.$elv->prenom.'</b></label></td><td class="tc-center"><label><b>'.$elv->email.'</b></label></td><td class="tc-center"><label><b>'.$elv->télé.'</b></label></td><td class="tc-center"><label><b>'.$elv->nomFiliere.'</b></label></td><td class="tc-center"><label><b>'.$elv->nom_class.'</b></label></td><td class="tc-center">	<div class="btn-toolbar" role="toolbar"><div class="btn-group" role="group"><a href="http://127.0.0.1:8000/ModifierEtudiant/'.$elv->id.'" class="btn btn-primary">Modifier</a><a href="http://127.0.0.1:8000/archiveEtudiant/'.$elv->id.'" class="btn btn-info">Archiver</a></div></div></td></tr>';
                }
            }else{
                $outpout='<tr><td class="tc-center"colspan="10">Pas étudiant dans cette class</td></tr>'; 
            }
            return $outpout;
        

        }else{
            if(Session::has('idAdmin')){
                $eleves=User::select('users.*','classes.nom_class','filieres.nomFiliere')
                ->join('filieres','filieres.id','users.filiere')
                ->join('classes','classes.id','users.id_class')
                ->join('ligne_class_profs','ligne_class_profs.Class','classes.id')
                ->where('classes.id', $request->idclass)
                ->orderBy('id', 'DESC')->get();
                if(count($eleves)>0){
                    foreach($eleves as $elv)
                    {
                        $outpout.='<tr><td class="tc-center"><label><b>'.$elv->name.' '.$elv->prenom.'</b></label></td><td class="tc-center"><label><b>'.$elv->email.'</b></label></td><td class="tc-center"><label><b>'.$elv->télé.'</b></label></td><td class="tc-center"><label><b>'.$elv->nomFiliere.'</b></label></td><td class="tc-center"><label><b>'.$elv->nom_class.'</b></label></td><td class="tc-center">	<div class="btn-toolbar" role="toolbar"><div class="btn-group" role="group"><a href="http://127.0.0.1:8000/ModifierEtudiant/'.$elv->id.'" class="btn btn-primary">Modifier</a><a href="http://127.0.0.1:8000/archiveEtudiant/'.$elv->id.'" class="btn btn-info">Archiver</a></div></div></td></tr>';
                    }
                }else{
                    $outpout='<tr><td class="tc-center"colspan="10">Pas étudiant dans cette class</td></tr>'; 
                }
                return $outpout;
                 
            }


            
        }


    }
}
