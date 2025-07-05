<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        $json = $data->toJson();
        file_put_contents("json/user.json", $json);
        return view('user/index');
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
        
        $user = new User();
        $user->name = $data->name;
        $user->email = $data->email;
        $user->address = $data->address;
        $user->password = Hash::make($data->password);
        $user->is_admin = $data->is_admin;

        //print_r($user);die();
        
        try {
            //print_r($grape->name);die();
            $user->save();
            echo true;
        } catch (\Throwable $th) {
            echo false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = json_decode(file_get_contents("php://input"));
        //print_r($data);die();
        $user = User::find(intval($data->id));
        $user->id = intval($data->id);
        
        $user->name = $data->name;
        $user->email = $data->email;
        $user->address = $data->address;
        $user->is_admin = $data->is_admin;
        //print_r($user);die();
        try {
            $user->update();
            echo true;
        } catch (\Throwable $th) {
            echo false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$data = json_decode(file_get_contents("php://input"));
        $parts = explode("/", $_SERVER['REQUEST_URI']);
        $data = end($parts);
        //print_r($data);die();
        $user = User::find(intval($data));
        //print_r($user);die();
        try {
            $user->delete();
            echo true;
        } catch (\Throwable $th) {
            echo false;
        }
    }
}
