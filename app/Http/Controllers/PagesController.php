<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Car;

class PagesController extends Controller
{
    public function index(){
        $cars= DB::table('cars')->where('parked', true)->paginate(3);
        $clients = DB::table('clients')->get();
        
        return view('pages.index')->with('cars', $cars)->with( 'clients', $clients);
    }

    public function clients(){
        $clients = DB::table('clients')->paginate(3);
        return view('pages.clients')->with('clients', $clients);
    }

    public function add(){
        $clients = DB::table('clients')->select('client_id', 'name')->get();
        return view('pages.add')->with('clients', $clients);
    }
    public function showCars($id){
        $currentCars = DB::table('cars')->where('client_id', $id)->paginate(3);
        $client = DB::table('clients')->where('client_id', $id)->get();
        return view('pages.currentCars')->with('currentCars', $currentCars)->with('client', $client);
    }
    public function editClient($id){
        $client = DB::table('clients')->where('client_id', $id)->get();
        return view('pages.editClient')->with('client', $client);

    }
    public function editCar($slate){
        $car = DB::table('cars')->where('slate', $slate)->get();
        $clients = DB::table('clients')->select('client_id', 'name')->get();
        return view('pages.editCar')->with('car', $car)->with('clients', $clients);
    }
    public function park(){
        $clients = DB::table('clients')->get();
        return view('pages.park')->with('clients', $clients);
    }
}

