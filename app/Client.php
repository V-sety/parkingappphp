<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Client extends Model
{
    public function getAllpag(){
        return DB::table('clients')->paginate(3);
    }
    public function getAll(){
        return DB::table('clients')->get();
    }
    public function getIDandName(){
        return DB::table('clients')->select('client_id', 'name')->get();
    }
    public function getClientbyID($id){
        return DB::table('clients')->where('client_id', $id)->get();
    }
    public function saveInfo($request){
        DB::table('clients')->insertGetId([
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'adress' => $request->input('adress')
        ]);
    }
    public function saveEdit($request, $id){
        DB::table('clients')
              ->where('client_id', $id)
              ->update([
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'adress' => $request->input('adress'),
            ]); 
    }
    public function deleteCl($id){
        DB::table('clients')->where('client_id',$id)->delete();
    }
    public function cars(){
        return $this->hasMany('App\Car');
    }
}
