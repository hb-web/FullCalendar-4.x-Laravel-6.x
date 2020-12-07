<?php

namespace App\Http\Controllers;

use App\FastEvent;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
{
    public function index(Request $request)
    {
        $fastEvents = FastEvent::all();

        return view('fullcalendar.views.calendar', ['fastEvents' => $fastEvents]);
    }
    public function program_eleve(Request $request)
    {
        $fastEvents = FastEvent::all();

        return view('fullcalendar.views.eleve', ['fastEvents' => $fastEvents]);
    }

}
