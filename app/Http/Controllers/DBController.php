<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

class DBController extends Controller
{
    
    public function addAclient(Request $request){
        return view('pages.addCl');
    }
    public function saveInfo(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'gender' => 'required',
            'phone' => 'required'
        ]);

        DB::table('clients')->insertGetId([
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'adress' => $request->input('adress')
        ]);
        
        return redirect('/clients')->with('success', 'Client Created');
    }
    public function saveCar(Request $request){
        $this->validate($request,[
            'slate' => 'required|unique:cars',
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required'
        ]);
            if($request->get('parked')){
                $parked = true;
            } else{
                $parked = false;
            }
        
        DB::table('cars')->insertGetId([
            'slate' => $request->input('slate'),
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'color' => $request->input('color'),
            'parked' => $parked,
            'client_id' => $request->input('client_id')
        ]);
        return redirect('/')->with('success', 'Car Created');
    }

    public function saveEditClient(Request $request, $id){
        $this->validate($request,[
            'name' => 'required',
            'gender' => 'required',
            'phone' => 'required'
        ]);
        DB::table('clients')
              ->where('client_id', $id)
              ->update([
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'adress' => $request->input('adress'),

            ]); 

        return redirect('/clients')->with('success', 'Client updated!');
    }

    public function saveEditCar(Request $request, $slate){
        $this->validate($request,[
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required'
        ]);
         DB::table('cars')
              ->where('slate', $slate)
              ->update([
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'color' => $request->input('color'),
            'parked' => $request->input('parked'),
            'client_id' => $request->input('client_id'),
            ]);


    }
    public function deleteClient($id){
        DB::table('clients')->where('client_id',$id)->delete();
        return redirect('/clients')->with('success', 'Client deleted!');

    }
    public function deleteCar($id){
        DB::table('cars')->where('slate',$id)->delete();
        return redirect('/clients')->with('success', 'Car deleted!');

    }
    public function parkCar(Request $request ){   
        DB::table('cars')->where('slate', $request->car)->update([
        'parked' => true,
    ]);
        return redirect('/')->with('success', 'Car parked');
    }
    public function onChange($client_id){
        $client_id = urldecode($client_id);
        $cars= DB::table('cars')->select('slate', 'model')->where('client_id', $client_id)->where('parked', false)->get();
        return json_encode($cars);

    }
}

