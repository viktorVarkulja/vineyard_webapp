<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bottle;

class HomeController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index()
    {
        $data = Bottle::all();
        $json = $data->toJson();
        file_put_contents("json/bottle.json", $json);
        return view('home');
    }
    
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function admin()
    {
        return view('admin_home');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mail_contact(Request $request)
    {
        $request -> validate([
            'inputName' => 'required',
            'inputEmail'  => 'required',
            'inputText' => 'required'
        ]);
        $name = $request->inputName;
        $email = $request->inputEmail;
        $message = $request->inputText;

        // Recipient email address (replace with your own)
        $recipient = "varkulyaviktor@gmail.com";
                
        // Additional headers
        $headers = "From: $name <$email>";
        //print_r($headers);die();
        if (mail($recipient, $message, $headers)) {
            echo "Email sent successfully!";
        } else {
            echo "Failed to send email. Please try again later.";
        }
        
        
        return view('home');
    }
}
