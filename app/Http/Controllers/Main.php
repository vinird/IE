<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// added
use App\Categoria;
use App\Acuerdo;
use App\Sede;
use App\Notification;
use App\User;
use App\LogUser;
use App\Mensaje;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Seguimiento;


class Main extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        $acuerdos = Acuerdo::take(125)->get();
        $sedes = Sede::all();
        $notifications = Notification::take(65)->orderBy('created_at', 'desc')->get();
        $logUser = LogUser::find(1);
        $users = User::all();
        $mensajes = collect(DB::table('mensajes')->take(125)->where('takeBy', '=', Auth::user()->id)->orderBy('created_at' , 'desc')->get());
        $mensajes2 = collect(DB::table('mensajes')->take(125)->where('takeBy', '=', Auth::user()->id)->orderBy('sendBy', 'created_at', 'desc')->get());
        // $mensajes2 = DB::select("SELECT * FROM mensajes  WHERE takeBy = ".Auth::user()->id." ORDER BY sendBy, created_at DESC LIMIT 0 , 55");
        // $mensajes2 = collect(DB::table('mensajes')->take(125)->where('takeBy', '=', Auth::user()->id)->groupBy('sendBy')->orderBy('created_at' , 'asec')->get());
        $seguimientos = Seguimiento::take(999999)->orderBy('created_at', 'acuerdo_id', 'asc')->get();
        return view('admin/adminMain' , ['categorias' => $categorias , 'users' => $users , 'acuerdos' => $acuerdos, 'sedes' => $sedes, 'notifications' => $notifications , 'logUser' => $logUser , 'mensajes' => $mensajes , 'mensajes2' => $mensajes2 , 'seguimientos' => $seguimientos]);
    }

    public function indexInformativa(){
        $users = DB::select("SELECT name , email , phone , sede_id FROM users");
        $sedes = DB::select("SELECT id , name FROM sedes");
        return view('informativa.contactos' , ['contactosActive' => true , 'users' => $users , 'sedes' => $sedes]);
    }
    
}
