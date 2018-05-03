<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
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
	
	public function llamadasSalientes(Request $request){
		//Log::info($_REQUEST);
		$data=$request->all();
		//Log::info("inicio");
		Log::info($data);
		//Log::info("fin");
		$comando="";
		$option="";
		$userfield="";
		
		if (!isset($data['userfield']) or $data['userfield']=""){
			$userfield="0";
		}
		else{
			$userfield=$data['userfield'];
		}
		
		switch($userfield){
			case "0":
				$comando="dial";
				$option="extension,109,30,called,20";
				$userfield="3";
				break;
			case "3":
				$comando="hangup";
				$option="";
				$userfield="";
				break;
		}
		$cadena=array("command"=>$comando,"options"=>$option,"userfield"=>$userfield);
		echo json_encode($cadena);
		
	}
	
	public function llamadasEntrantes(Request $request){
		//$data=$request->all();
		Log::info($_REQUEST);
		//Log::info($data);
	}
	
	public function reporteLlamadas(Request $request){
		Log::info($_REQUEST);
	}
}
/*
[2018-05-02 19:57:55] local.INFO: array (
  'ID' => '1525291061.0506',
  'src' => 'anonymous',
  'dst' => '005217221569361',
  'api' => 'API 6230f',
  'startcall' => '2018-05-02 21:57:41',
  'userdata' => '',
)  
[2018-05-02 19:57:56] local.INFO: array (
  'ID' => '1525291061.0506',
  'src' => 'anonymous',
  'dst' => '005217221569361',
  'api' => 'API 6230f',
  'userfield' => '',
  'command' => '',
  'options' => '',
  'description' => 'Command not found',
  'statuscode' => '401',
  'startcall' => '',
  'durationcall' => '',
  'durationcallanswered' => '',
  'statuscall' => 'ANSWER',
  'userdata' => '',
)  
[2018-05-02 19:57:57] local.INFO: array (
  'ID' => '1525291061.0506',
  'src' => 'anonymous',
  'dst' => '005217221569361',
  'api' => 'API 6230f',
  'statuscall' => 'CANCEL',
  'userfield' => '',
  'command' => '',
  'options' => '',
  'startcall' => '2018-05-02 21:57:41',
  'durationcall' => '15',
  'durationcallanswered' => '',
  'userdata' => '',
)  
*/