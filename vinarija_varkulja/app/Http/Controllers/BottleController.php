<?php

namespace App\Http\Controllers;

use App\Models\Bottle;
use Illuminate\Http\Request;

class BottleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bottle::all();
        $json = json_encode($data);
        file_put_contents("json/bottle.json", $json);

        $data_homepage = Bottle::all()->sortByDesc('id')->take(5);
        file_put_contents("json/bottle_homepage.json", json_encode($data_homepage));
        return view("bottle/index");
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
        //$data = json_decode(file_get_contents("php://input"));
        $data = json_decode($_POST['bottleInfo']);

        //print_r($data);die();

        $bottle = new Bottle();
        $bottle->name = $data->name;
        $bottle->wine_id = intval($data->wineId);
        $bottle->size = $data->size;
        $bottle->quantity = $data->amount;
        $bottle->cost_RSD = $data->cost;

        if($data->amount>0)
        {
            $bottle->in_stock = true;
        }else{
            $bottle->in_stock = false;
        }

        $type_long = $_FILES['file']['type'];
        $parts = explode("/", $type_long);
        $type = end($parts);
        $image_name = $data->name."_".$data->size.".".$type;

        //print_r($image_name);die();
        $location = "images/";
        move_uploaded_file($_FILES["file"]['tmp_name'], $location.$image_name);
        
        $bottle->image = $image_name;

        try {
            //print_r($grape->name);die();
            $bottle->save();
            echo true;
        } catch (\Throwable $th) {
            echo false;
            echo $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bottle  $bottle
     * @return \Illuminate\Http\Response
     */
    public function show(Bottle $bottle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bottle  $bottle
     * @return \Illuminate\Http\Response
     */
    public function edit(Bottle $bottle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bottle  $bottle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bottle $bottle)
    {
        $data = json_decode($_POST['bottleInfo']);

        //print_r($data);die();
        $bottle = Bottle::find(intval($data->id));
        $bottle->id = intval($data->id);
        $bottle->name = $data->name;
        $bottle->wine_id = intval($data->wineId);
        $bottle->size = $data->size;
        $bottle->quantity = $data->quantity;
        $bottle->cost_RSD = $data->cost_RSD;

        if($data->quantity>0)
        {
            $bottle->in_stock = true;
        }else{
            $bottle->in_stock = false;
        }

        if($_FILES)
        {
            $type_long = $_FILES['file']['type'];
            $parts = explode("/", $type_long);
            $type = end($parts);
            $image_name = $data->name."_".$data->size.".".$type;
            //print_r($image_name);die();
            $location = "images/";
            move_uploaded_file($_FILES["file"]['tmp_name'], $location.$image_name);
        
            $bottle->image = $image_name;
        }

        try {
            //print_r($grape->name);die();
            $bottle->update();
            echo true;
        } catch (\Throwable $th) {
            echo false;
            echo $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bottle  $bottle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bottle $bottle)
    {
         //$data = json_decode(file_get_contents("php://input"));
         $parts = explode("/", $_SERVER['REQUEST_URI']);
         $data = end($parts);
         //print_r($data);die();
         $bottle = Bottle::find(intval($data));
         try {
             $bottle->delete();
             echo true;
         } catch (\Throwable $th) {
             echo false;
         }
    }
}
