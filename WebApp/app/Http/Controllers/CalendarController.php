<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Horaire;
use App\Models\Dayclass;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CalendarController extends Controller
{
    public function index()
    {
        $horaires = Horaire::all();
        $data = array();

        foreach($horaires as $horaire) {
            $id = $horaire->id;
            $days = Dayclass::where('horaireID', $id)->get();
            
            foreach($days as $day) {
                array_push($data, $day);
            } 
        } 

        return view('calendar', ['data' => $data]);
    }

    public function getData() {
        $horaires = Horaire::all();
        $data = array();

        foreach($horaires as $horaire) {
            $id = $horaire->id;
            $days = Dayclass::where('horaireID', $id)->get();
            
            foreach($days as $day) {
                array_push($data, $day);
            } 
        } 

        return response([
            'success' => true,
            'data' => $data,
            'message' => "ok",
        ], 200);
    }
}
