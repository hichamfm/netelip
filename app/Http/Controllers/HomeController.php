<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
	
	public function frmEnviar(){
		return view('netelip.form');
	}
	
	public function enviar(Request $request){
		$url="https://apivoice.netelip.com"; 
		$data=array("token"=>$_POST["token"],
					"api"=>$_POST["api"],
					"src"=> $_POST["src"],
					"dst"=>$_POST["dst"],
					"duration"=>$_POST["duration"], 
					"typedst"=>$_POST["typedst"]);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url); 
		curl_setopt($ch, CURLOPT_HEADER, FALSE); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 5); 
		curl_setopt($ch, CURLOPT_MAXREDIRS, 3); 
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
		curl_setopt($ch, CURLOPT_POST, TRUE); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
		$result_curl= curl_exec($ch);
		$http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE ); 
		curl_close($ch);
		echo $result_curl;
	}
}
