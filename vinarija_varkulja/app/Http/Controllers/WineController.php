<?php

namespace App\Http\Controllers;

use App\Models\Wine;
use Illuminate\Http\Request;

class WineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Wine::all();
        $json = json_encode($data);
        file_put_contents("json/wine.json", $json);
        return view('wine/index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode(file_get_contents("php://input"));
        //print_r($data->grapeId);die();
        $wine = new Wine();
        $wine->name = $data->name;
        $wine->year = $data->year;
        $wine->grape_id = intval($data->grapeId);
        
        
        try {
            //print_r($grape->name);die();
            $wine->save();
            echo true;
        } catch (\Throwable $th) {
            echo false;
            echo $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wine  $wine
     * @return \Illuminate\Http\Response
     */
    public function show(Wine $wine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wine  $wine
     * @return \Illuminate\Http\Response
     */
    public function edit(Wine $wine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wine  $wine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wine $wine)
    {
        $data = json_decode(file_get_contents("php://input"));
        //print_r($data);die();
        $wine = Wine::find(intval($data->id));
        $wine->id = intval($data->id);
        //print_r($input->id);die();
        $wine->name = $data->name;
        $wine->year = $data->year;
        $wine->grape_id = intval($data->grapeId);
        
        try {
            $wine->update();
            echo true;
        } catch (\Throwable $th) {
            echo false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wine  $wine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wine $wine)
    {
        //$data = json_decode(file_get_contents("php://input"));
        $parts = explode("/", $_SERVER['REQUEST_URI']);
        $data = end($parts);
        //print_r($data);die();
        $wine = Wine::find(intval($data));
        try {
            $wine->delete();
            echo true;
        } catch (\Throwable $th) {
            echo false;
        }
    }
}
