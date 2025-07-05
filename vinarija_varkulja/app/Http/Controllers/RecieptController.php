<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\StatusReciept;
use Illuminate\Http\Request;

class RecieptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = StatusReciept::all();
        $json = json_encode($data);
        file_put_contents("json/status_reciept.json", $json);

        $data = Receipt::all();
        $json = json_encode($data);
        file_put_contents("json/receipt.json", $json);

        return view('reciept/index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show(Receipt $receipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipt $receipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receipt $receipt)
    {
        $data = json_decode(file_get_contents("php://input"));
        //print_r($data);die();
        $reciept = Receipt::find(intval($data->id));
        $reciept->id = intval($data->id);
        //print_r($input->id);die();
        $reciept->total_RSD = $data->total;
        $reciept->status = $data->status;
        $reciept->created_at = $data->created_at;
        
        try {
            $reciept->update();
            echo true;
        } catch (\Throwable $th) {
            echo false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipt $receipt)
    {
        //
    }
}
