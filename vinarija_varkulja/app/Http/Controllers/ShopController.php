<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class ShopController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        /*if(Auth::check())
        {
            return view('shop.index');
        }
        else{
            return redirect()->route('login');
        }*/
        return view('shop.index');
    }
    
    /** 
    * Gets all the products from the cart
    */ 
    public function cartItems()
    {
        session_start();
        if(isset($_SESSION['cart']))
        {
            $array = array_values($_SESSION['cart']);
            echo json_encode($array);
        }
    }
    
    /**
    * Adds item to cart
    */
    public function addItems()
    {
        session_start();
        $data = json_decode(file_get_contents("php://input"));
        //print_r($data);die();
        $item_id = $data->id;
        $item_price = $data->cost_RSD;
        $item_name = $data->name;
        $item_amount = $data->amount;
        
        if(isset($_SESSION['cart']))
        {
            $is_available = 0;
            foreach($_SESSION['cart'] as $keys => $values)
            {
                if($_SESSION['cart'][$keys]['id'] == $item_id)
                {
                    $is_available++;
                    $_SESSION['cart'][$keys]['amount'] = $_SESSION['cart'][$keys]['amount'] + $item_amount;
                }
            }
            if($is_available == 0)
            {
                $item_array = array(
                    'id' => $item_id,
                    'name' => $item_name,
                    'price' => $item_price,
                    'amount' => $item_amount
                );
                $_SESSION['cart'][] = $item_array;
            }
        }
        else{
            $item_array = array(
                'id' => $item_id,
                'name' => $item_name,
                'price' => $item_price,
                'amount' => $item_amount
            );
            $_SESSION['cart'][] = $item_array;
        }
    }

    public function removeItem()
    {
        session_start();
        $data_id = json_decode(file_get_contents("php://input"));

        $item_id = $data_id;
        foreach($_SESSION['cart'] as $keys => $values)
        {
            if($values['id'] == $item_id)
            {
                unset($_SESSION['cart'][$keys]);
            }
        }
    }
}
