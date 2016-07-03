<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
// added
use App\Mensaje;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use App\User;
use DB;
use App\Categoria;
use App\Acuerdo;
use App\Sede;
use App\Notification;
use App\LogUser;

class Mensajes extends Controller
{
    public function index(){

    }

    public function store(Request $request){
    	$message = new Mensaje;
    	$message->message = $request->message;
    	$message->sendBy  = Auth::user()->id;
    	$message->takeBy  = $request->takeBy;
    	if($message->save()){
            Flash::success(' Mensaje enviado. ');
            $user = User::find($request->takeBy);
            $user->message = $user->message + 1;
            $user->save();
    	} else {
            Flash::error(' Error al enviar el mensaje. ');
    	}
        return Redirect::back();
    }

    public function clearMessages(){
        $user = User::find(Auth::user()->id);
        $user->message = 0;
        if ($user->save()) {} else {
            Flash::error(' Error al marcar mensajes como leídos. ');
        }
        return Redirect::back();
    }

    public function getSendBy($sendBy){
        // $mensajes2 = DB::select("SELECT * FROM `mensajes` ORDER BY sendBy, created_at DESC LIMIT 0 , 55");
        // $mjs = collect(DB::table('mensajes')->take(125)->where([['sendBy', '=', $sendBy] , ['takeBy', '=', Auth::user()->id]])->orderBy('created_at' , 'desc')->get());
        $mjs = DB::select("SELECT * FROM `mensajes` WHERE sendBy = '".$sendBy."' and takeBy = '".Auth::user()->id."' or sendBy = '".Auth::user()->id."' and takeBy = '".$sendBy."' ORDER BY created_at desc LIMIT 0, 300;");
        $mjs = collect($mjs);

        $categorias = Categoria::all();
        $acuerdos = Acuerdo::take(25)->get();
        $sedes = Sede::all();
        $notifications = Notification::take(25)->orderBy('created_at', 'desc')->get();
        $logUser = LogUser::find(1);
        $users = User::all();
        $mensajes = collect(DB::table('mensajes')->take(125)->where('takeBy', '=', Auth::user()->id)->orderBy('created_at' , 'desc')->get());
        $mensajes2 = DB::select("SELECT * FROM `mensajes` WHERE takeBy = '".Auth::user()->id."' ORDER BY sendBy, created_at DESC LIMIT 0 , 55");
        // $mensajes2 = collect(DB::table('mensajes')->take(125)->where('takeBy', '=', Auth::user()->id)->groupBy('sendBy')->orderBy('created_at' , 'asec')->get());
        return view('admin/adminMain' , ['categorias' => $categorias , 'users' => $users , 'acuerdos' => $acuerdos, 'sedes' => $sedes, 'notifications' => $notifications , 'logUser' => $logUser , 'mensajes' => $mensajes , 'mensajes2' => $mensajes2 , 'mjs' => $mjs]);

        // return Redirect::route('admin.main', ['mjs' => $mjs]);


    }
}
