<?php

namespace App\Http\Controllers;

use App\Administration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Filiere;
use App\Professeur;
use App\Matiere;
use Illuminate\Support\Facades\Redirect;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function register()
    {
        return view('security.register');
    }
    public function addUser (Request $request)
    {
      
         
        $pass = Hash::make($request->pass);
        $EmailUser=User::where('email',$request->email)->first();

        if($EmailUser!= null){      
            return Redirect::back()->withErrors(['vous êtes deja inscrit avec ce email veuillez recuperer votre compte ou reinscriver-vous ', 'The Message']);
         }else{
          
            $user = new User([
                'name'    => $request->nom ,
                'prenom'    => $request->prenom ,
                'email'    => $request->email ,
                'télé'    => $request->tel ,                                           
                'vraiPassword'    => $request->pass ,
                'password'    => $pass  ,
                'type' => 'hor ecole'
            ]);
            $user->save();

            echo "votre compte a été enregistrer";
             
             }
    }
    public function Contact(Request $request)
    {
        
        return view('fullcalendar.views.Contact');
    }
    public function index(Request $request)
    {
        $request->session()->forget('idprof');
        $request->session()->forget('idAdmin');
        return view('security.login');
    }
     
    public function login_admin(Request $request)
    {
        $request->session()->forget('idprof');
        $request->session()->forget('idAdmin');
        return view('security.login_Administration');
    }
    public function checkLoginAdmin(Request $request)
    {
        $request->validate([
            'email'    =>  'required',
            'pass'     =>  'required'
        ]);

        $email=$request->input('email');
        $pass=$request->input('pass');
        $admin=Administration::select('administrations.*','title')
        ->join('roles','roles.id','administrations.role')
        ->where('email',$email)->first();

      if (!$admin) { 
       return view('security.login_Administration', [ 'errorMessageDuration' => 'Ce compte administrative est introuvable']);
     }else{
        if (!Hash::check($pass, $admin->password)) { 
            return view('security.login_Administration', [
                'errorMessageDuration' => 'Votre mot de passe est incorrect'
                ]);
            }else{   
                Session::put('idAdmin', $admin->id);
                Session::put('emailAdmin', $admin->email);
                Session::put('NomAdmin', $admin->name." ".$admin->prenom);
                Session::put('fonction', $admin->title);
                
                if($admin->title="HB")
                { 
                     return redirect('dashboard');

                }
                // else{
                //     echo 'dashbord directeur';
                // }
                 
            }
        }
    }
    public function checkLogin(Request $request)
    {    
        $request->validate([
            'email'    =>  'required|email',
            'pass'     =>  'required'
        ]);
            
        $email=$request->input('email');
        $pass=$request->input('pass');
        $user=User::select('users.*')->where('email',$email)->first();
        $eleve=User::select('users.*','classes.*')->join('classes','classes.id','users.id_class')
        ->where('email',$email)->first();
 
        
      if (!$user) {
    //    return view('security.login', ['errorMessageDuration' => 'Ce compte étudiant est introuvable']);
    // return redirect('login')->with('errorMessageDuration', 'Error!azertyui');
    return view('security.login', [
        'errorMessageDuration' => 'Ce compte étudiant est introuvable'
   ]);

    }else{

        if (!Hash::check($pass, $user->password)) {
           
            return view('security.login', [
                'errorMessageDuration' => 'Votre mot de passe est incorrect'
           ]);
            }else{ 

                
                if($user->id_class==null)
                {
                    return view('security.login', ['errorMessageDuration' => "Votre compte n'a pas encore activer veuiller contacter administration"]); 
                }else{
                    Session::put('nomcomplet', $user->name.' '.$user->prenom);
                    Session::put('classEtudiant', $eleve->id_class);
                    Session::put('Nomclass', $eleve->nom_class);
                    Session::put('télé', $eleve->télé);
                    Session::put('idRole', $user->id);
                    Session::put('titleRole', $user->title);
                    Session::put('idUser', $user->id);
                    Session::put('email', $user->email);
                    $filiers=Filiere::where('id',$user->filiere)->first();
                    Session::put('IdFiliere', $filiers->id);
                    Session::put('filiere', $filiers->nomFiliere);
                    return redirect('mon_programme');
              }

            }
     }
    }

    public function checkLoginPanel(Request $request)
    {
        $request->validate([
            'email'    =>  'required',
            'pass'     =>  'required'
        ]);
        $email=$request->input('email');
        $pass=$request->input('pass');
        $profs=Professeur::where('email',$email)->first();
      if (!$profs) { 
       return view('security.login_Panel', [
        'errorMessageDuration' => 'Ce compte professeur est introuvable'
        ]);
     }else{
        if (!Hash::check($pass, $profs->password)) {
            return view('security.login_Panel', [
                'errorMessageDuration' => 'Votre mot de passe est incorrect'
           ]);
            
            }else{  
                Session::put('idprof', $profs->id);
                Session::put('emailProf', $profs->email);
                Session::put('NomProf', $profs->name." ".$profs->prenom);
                Session::put('matiere', $profs->matiere); 
                $matieres=Matiere::find($profs->matiere);
                Session::put('nomMatiere', $matieres->nomMatiere);
                $request->session()->forget('idAdmin');
                
                return redirect('dashboard');
            }
        }
    }
    public function succelogin(Request $request)
    {
        if($request->session()->has('idUser')){       
            
            return view('fullcalendar.views.eleve');
        }else return redirect('login');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
