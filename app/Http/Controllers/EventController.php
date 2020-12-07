<?php

namespace App\Http\Controllers;

use App\Event;
use App\Cour;
use App\live;
use App\Http\Requests\EventRequest;
use App\LigneClassProf;
use Illuminate\Http\Request;
use Session;

class EventController extends Controller
{
    public function loadEvents(Request $request,$classe,$id)
    {
 
        $events=Event::select('events.*')
        ->join('ligne_class_profs','ligne_class_profs.id','events.ClassETprof')
        ->join('classes','classes.id','ligne_class_profs.Class')
         ->where(['ClassETprof' => $id,'classes.nom_class' => $classe])->get();   
        $start = (!empty($request->start)) ? ($request->start) : ('');
        $end = (!empty($request->end)) ? ($request->end) : ('');
        /** Retornaremos apenas os eventos ENTRE as datas iniciais e finais visiveis no calendário */
        // $events = Event::where('filiere',Session::get('IdFiliere'))->whereBetween('start', [$start, $end])->get($returnedColumns);
        return response()->json($events);

    }
 public function loadEventStudent(Request $request)
    {
        $class=Session::get('classEtudiant');
        $events=Event::select('events.*')
        ->join('ligne_class_profs','ligne_class_profs.id','events.ClassETprof')
        ->where(['ligne_class_profs.Class'=>$class,'events.etat'=>1 ])
        ->get();
        return response()->json($events);
    }
    public function store(EventRequest $request)
    { 
        if(Session::has('idprof'))
        {    
            $prof=Session::get('idprof');
            if ($request->type== "document")
            {
                $cour=$request->cours;
                // $color="#255e80";
            }else{
                $cour=$request->salle;
                // $color="#a9c939";
            }
            $color="#ff7f00";
            Event::create([
                'title' => $request->title,
                'ClassETprof' => $request->class,
                'prof' => $prof,
                'start' => $request->start,
                'end' => $request->end,
                'color' => $color,
                'cour'=> $cour,
                'description' => $request->description,
                'type_event' => $request->type,
                'etat' => 0,
                 
            ]);
        }else{
             
            $prof=$request->prof;
            $color="#ff7f00";
            if ($request->type== "document")
            {
                $cour=$request->cours;
                $color="#255e80";
            }else{
                $cour=$request->salle;
                $color="#a9c939";
            }
            Event::create([
                'title' => $request->title,
                'ClassETprof' => $request->class,
                'prof' => $prof,
                'start' => $request->start,
                'end' => $request->end,
                'color' => $color,
                'cour'=> $cour,
                'description' => $request->description,
                'type_event' => $request->type,
                'etat' => 0,
                 
            ]);
        }

        return response()->json(true);
    }

    public function update(EventRequest $request)
    {
        if(Session::has('idprof'))
        {
            $event = Event::where('id', $request->id)->first();
            
            if ($request->type== "document")
            {
                $cour=$request->cours;
                $color="#255e80";
            }else{
                $cour=$request->salle;
                $color="#a9c939";
            }
            $event->color=$color;
            $event->title = $request->title;
            $event->ClassETprof = $request->class;
            $prof=Session::get('idprof');
            $event->prof = $prof;  
            $event->start = $request->start;
            $event->end = $request->end;
            $event->cour= $cour;
            $event->description = $request->description;
            $event->type_event = $request->type;
            $event->etat=$request->etat;
            
        }else{
        
        $event = Event::where('id', $request->id)->first();
            
            if ($request->type== "document")
            {
                
            }else{
                
            }
            $event->title = $request->title;
            $event->ClassETprof = $request->class;
           
             
            
                $color="#f0000";
                if($request->type=='document')
                {
                    $cour=$request->cours; 
                }
                if($request->type=='en ligne')
                {
                    $cour=$request->salle; 
                }

            
                if($request->etat==0)
                {
                    $color="#ff7f00";
                }else{
                    if($request->type=='en ligne')
                    {
                        $color="#a9c939"; 
                    }
                    if($request->type=='document')
                    {
                        $color="#255e80";
                    }
                }
            $event->color= $color;
            $event->prof = $request->prof; 
            $event->start = $request->start;
            $event->end = $request->end;
            $event->cour= $cour;
            $event->description = $request->description;
            $event->type_event = $request->type;
            $event->etat=$request->etat;
            
    } 
$event->save();
        return response()->json(true);
    }

    public function destroy(Request $request)
    {
        Event::where('id', $request->id)->delete();

        return response()->json(true);
    }

  public function mycalender(Request $request,$classe,$idLigClasProf)
    {
      
        if(Session::get('idprof'))
        {
            $cours=Cour::where('matiere',Session::get('matiere'))->get();
            
            $lives=live::all();
            return view("admin.emploiTempClass",compact('cours','lives','classe','idLigClasProf')); 
            // return view("admin.calendrierClass",compact('filiere','cours','lives','class'));
        }else{
            $cours=Cour::all();
            $lives=live::all();
            $prof=LigneClassProf::select('professeurs.*')
            ->join('professeurs','professeurs.id','ligne_class_profs.Prof')
            ->where('ligne_class_profs.id',$idLigClasProf)->first();
            return view("admin.emploiTempClass",compact('cours','lives','classe','idLigClasProf','prof'));
        }
    } 

}
