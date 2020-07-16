<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Car;
use App\Client;

class ClientsController extends Controller
{
    public function addAclient(Request $request){
        return view('pages.addCl');
    }
    public function saveInfo(Request $request){
        $model = new Client();

        $this->validate($request,[
            'name' => 'required',
            'gender' => 'required',
            'phone' => 'required'
        ]);
    
        $model->saveInfo($request);
        
        return redirect('/clients')->with('success', 'Client Created');
    }
    public function saveEditClient(Request $request, $id){
        $model = new Client();

        $this->validate($request,[
            'name' => 'required',
            'gender' => 'required',
            'phone' => 'required'
        ]);

        $model->saveEdit($request, $id);

        return redirect('/clients')->with('success', 'Client updated!');
    }
    public function deleteClient($id){
        $model = new Client();
        $model->deleteCl($id);
        return redirect('/clients')->with('success', 'Client deleted!');

    }
}
