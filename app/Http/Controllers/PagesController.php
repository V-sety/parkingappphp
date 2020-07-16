<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Car;
use App\Client;

class PagesController extends Controller
{
    public function index(){
        $modelClient = new Client();
        $modelCar = new Car();

        $cars = $modelCar->getParkedpag();
        $clients = $modelClient->getAll();
        
        return view('pages.index')->with('cars', $cars)->with( 'clients', $clients);
    }

    public function clients(){
        $model = new Client();
        $clients = $model->getAllpag();
        return view('pages.clients')->with('clients', $clients);
    }

    public function add(){
        $model = new Client();
        $clients = $model->getIDandName();
        return view('pages.add')->with('clients', $clients);
    }
    public function showCars($id){
        $modelClient = new Client();
        $modelCar = new Car();

        $currentCars = $modelCar->getCarsOfaClientpag($id);
        $client = $modelClient->getClientbyID($id);

        return view('pages.currentCars')->with('currentCars', $currentCars)->with('client', $client);
    }
    public function editClient($id){
        $model = new Client();
        $client = $model->getClientbyID($id);
        return view('pages.editClient')->with('client', $client);

    }
    public function editCar($slate){
        $modelClient = new Client();
        $modelCar = new Car();

        $car = $modelCar->getCarbySlate($slate);
        $clients = $modelClient->getIDandName();
        return view('pages.editCar')->with('car', $car)->with('clients', $clients);
    }
    public function park(){
        $model = new Client();
        $clients = $model->getAll();
        return view('pages.park')->with('clients', $clients);
    }
}

