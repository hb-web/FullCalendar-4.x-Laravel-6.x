<?php

namespace App\Http\Controllers;

use App\Matiere;
use App\Professeur;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfController extends Controller
{
    //
    public function listProf()
    {
        $profs=Professeur::select('professeurs.*','matieres.nomMatiere')->join('matieres','matieres.id','professeurs.matiere')->get();
        return view('admin.listProf',compact('profs'));
    }
    public function addProf()
    {
        $matieres=Matiere::all();
        return view('admin.addProf',compact('matieres'));
    }
     
    public function store(Request $request)
    { 
         
        $pass = Hash::make($request->cin);
        $EmailUser=Professeur::where('email',$request->email)
        ->orWhere('CIN',$request->cin)
        ->first();
        if($EmailUser){      
           return Redirect::back()->withErrors(['votre CIN ou Email deja exist veuillez le verifier', 'The Message']);
        }else{
        $Professeur = new Professeur([
            'CIN'      =>$request->cin,
            'name'    => $request->nom ,
            'prenom'    => $request->prenom ,
            'email'    => $request->email ,
            'télé'    => $request->tel ,
            'matiere'    => $request->matiere ,             
            'vraiPassword'    => $request->cin ,
            'password'    => $pass  
        ]);
       
        $Professeur->save();
         
        return redirect('listProf'); 
        }
    }

}
