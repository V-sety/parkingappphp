<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Car extends Model
{
    public function getParkedpag(){
        return DB::table('cars')->where('parked', true)->paginate(3);
    }
    public function getCarsOfaClientpag($id){
        return DB::table('cars')->where('client_id', $id)->paginate(3);
    }
    public function getCarbySlate($slate){
        return DB::table('cars')->where('slate', $slate)->get();
    }
    public function client(){
        return $this->belongsTo('App\Client');
    }
    public function saveInfo($request){
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
        ]);;
    }
    public function saveEdit($request,$slate){
        DB::table('cars')
              ->where('slate', $slate)
              ->update([
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'color' => $request->input('color'),
            'parked' => $request->input('parked'),
            'client_id' => $request->input('client_id'),
            ]);;
    }
    public function deleteCar($slate){
        DB::table('cars')->where('slate',$slate)->delete();
    }
    public function park($request){
        DB::table('cars')->where('slate', $request->car)->update([
        'parked' => true,
    ]);
    }
    public function getParkedbyClient($client_id){
        return DB::table('cars')->select('slate', 'model')->where('client_id', $client_id)->where('parked', false)->get();
    }
    
}
