<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Receipt;
use App\Models\RecieptBottle;
use App\Models\Bottle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RecieptBottleController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('invoice/index');
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
        
        if(Auth::check())
        {
            session_start();
            if(isset($_SESSION['cart']))
            {
                $total = json_decode(file_get_contents("php://input"));
                $orderStmt = DB::select("SHOW TABLE STATUS LIKE 'receipt'");
                $nextId = $orderStmt[0]->Auto_increment;
                $reciept = new Receipt();
                $reciept -> id = $nextId;
                $reciept -> total_RSD = intval($total);
                $reciept -> user_id = Auth::user()->id;
                $reciept -> status = 1;
                $reciept -> save();

                $json = Receipt::all()->toJson();
                file_put_contents("json/reciept.json", $json);
                
                foreach($_SESSION['cart'] as $keys => $values)
                {
                    $invoice = new RecieptBottle();
                    $invoice -> reciept_id = Receipt::find($nextId)->id;
                    $invoice -> bottle_id = intval($_SESSION['cart'][$keys]['id']);
                    $invoice -> bottle_quantity = intval($_SESSION['cart'][$keys]['amount']);
                    $bottle = Bottle::find(intval($_SESSION['cart'][$keys]['id']));
                    $bottle -> quantity -= intval($_SESSION['cart'][$keys]['amount']);
                    if($bottle -> quantity <= 0)
                    {
                        $bottle -> in_stock = 0;
                    }
                    $bottle -> update();
                    $invoice -> save();
                    
                    $data = Bottle::all();
                    $json = json_encode($data);
                    file_put_contents("json/bottle.json", $json);
                    
                    $json = RecieptBottle::all()->toJson();
                    file_put_contents("json/reciept_bottle.json", $json);
                    
                    unset($_SESSION['cart'][$keys]);
                }  


            }
            
            echo $nextId;
        }
        else{
            echo true;
            //return view('invoice.index');
            //return redirect()->route('login');
        }
        
        
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Models\RecieptBottle  $recieptBottle
    * @return \Illuminate\Http\Response
    */
    public function show(RecieptBottle $recieptBottle)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\RecieptBottle  $recieptBottle
    * @return \Illuminate\Http\Response
    */
    public function edit(RecieptBottle $recieptBottle)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\RecieptBottle  $recieptBottle
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, RecieptBottle $recieptBottle)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\RecieptBottle  $recieptBottle
    * @return \Illuminate\Http\Response
    */
    public function destroy(RecieptBottle $recieptBottle)
    {
        //
    }
}
