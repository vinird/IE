<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Sede;
use Hash;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use App\Categoria;
use App\Notification;
use App\LogUser;
use DB;
use App\User;


class Sedes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        $notifications = Notification::take(35)->orderBy('created_at', 'desc')->get();
        $logUser = LogUser::find(1);
        $users = User::all();
        $mensajes = DB::table('mensajes')->take(125)->where('takeBy', '=', Auth::user()->id)->orderBy('created_at' , 'desc')->get();
        return view('admin.sede', ['sedes' => Sede::all() , 'categorias' => $categorias, 'notifications' => $notifications , 'logUser' => $logUser , 'users' => $users , 'mensajes' => $mensajes]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexInformativa()
    {
        return view('informativa.ubicacion', ['sedes' => Sede::all() , 'ubicacionActive' => true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $sede= new Sede;
      $sede->name= $request->name;
      $sede->address= $request->address;
      $sede->link= $request->link;
      if($sede->save()) {
        Flash::success(' Se guardó la sede exitosamente. ');
      } else {
        Flash::error(' Se produjó un problema al crear la sede. ');
      }
      return back();
    }

    public function updateSede(Request $request)
    {
      if (Hash::check($request->password, Auth::user()->password)) {
        $sede= Sede::find($request->id);
        $sede->name= $request->name;
        $sede->address= $request->address;
        $sede->link= $request->link;
        if($sede->save()) {
          Flash::success(' Se modificó la sede exitosamente. ');
        } else {
          Flash::error(' Se produjó un problema al modificar la sede. ');
        }
      }
      return back();
    }

    public function deleteSede(Request $request)
    {
      if (Hash::check($request->password, Auth::user()->password)) {
        if(Sede::destroy($request->id)) {
          Flash::success(' Se eliminó la sede exitosamente. ');
        } else {
          Flash::error(' Se produjó un problema al eliminar la sede. ');
        }
      }
      return back();
    }
}
