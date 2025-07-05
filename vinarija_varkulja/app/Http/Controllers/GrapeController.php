<?php

namespace App\Http\Controllers;

use App\Models\Grape;
use Illuminate\Http\Request;

class GrapeController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $data = Grape::all();
        $json = $data->toJson();
        file_put_contents("json/grape.json", $json);
        return view('grape/index');
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Models\Grape  $grape
    * 
    */
    public function store(Request $request)
    {
        $data = json_decode(file_get_contents("php://input"));
        
        $grape = new Grape();
        $grape->name = $data->name;
        //print_r($grape->name);
        
        try {
            //print_r($grape->name);die();
            $grape->save();
            echo true;
        } catch (\Throwable $th) {
            echo false;
        }
        //return redirect()->route('grape.index')->with(['response'=>$response]);
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Grape  $grape
    * @return \Illuminate\Http\Response
    */
    public function show(Grape $grape)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Grape  $grape
    * @return \Illuminate\Http\Response
    */
    public function edit(Grape $grape)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Grape  $grape
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request)
    {
        $data = json_decode(file_get_contents("php://input"));
        //print_r($data);die();
        $grape = Grape::find(intval($data->id));
        $grape->id = intval($data->id);
        //print_r($input->id);die();
        $grape->name = $data->name;
        
        try {
            $grape->update();
            echo true;
        } catch (\Throwable $th) {
            echo false;
        }
        
        /*return redirect()->action(
            [GrapeController::class, 'index']
        );*/
        //return view('grape/middle', ['msg' => 'Uspesno azurirali grozde.'] );
        //return redirect()->route('grape.middle', ['msg' => 'Uspesno azurirali grozde.'])
        //return redirect()->route('grape/middle', ['msg' => 'Uspesno azurirali grozde.']);
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Grape  $grape
    * @return \Illuminate\Http\Response
    */
    public function destroy(Grape $grape)
    {
        //$data = json_decode(file_get_contents("php://input"));
        $parts = explode("/", $_SERVER['REQUEST_URI']);
        $data = end($parts);
        //print_r($data);die();
        $grape = Grape::find(intval($data));
        try {
            $grape->delete();
            echo true;
        } catch (\Throwable $th) {
            echo false;
        }
        
        /*return redirect()->action(
            [GrapeController::class, 'index']
        );*/
    }
}
