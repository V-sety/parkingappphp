<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Car;
use App\Client;

class CarsController extends Controller
{
    public function saveCar(Request $request){
        $model = new Car();

        $this->validate($request,[
            'slate' => 'required|unique:cars',
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required'
        ]);
            $model->saveInfo($request);
        return redirect('/')->with('success', 'Car Created');
    }
    public function saveEditCar(Request $request, $slate){
        $model= new Car();
        $this->validate($request,[
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required'
        ]);
        $model->saveEdit($request, $slate);


    }
    public function deleteCar($slate){
        $model= new Car();
        $model->deleteCar($slate);
        return redirect('/clients')->with('success', 'Car deleted!');

    }
    public function parkCar(Request $request ){   
        $model= new Car();
        $model->park($request);
        return redirect('/')->with('success', 'Car parked');
    }
    public function onChange($client_id){
        $model = new Car();
        $client_id = urldecode($client_id);
        $cars= $model->getParkedbyClient($client_id);
        return json_encode($cars);

    }
}
