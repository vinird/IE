<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// added
use App\Categoria;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\LogUser;
use DB;

class Eventos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::take(25)->orderBy('created_at', 'desc')->get();
        $categorias = Categoria::all();
        $logUser = LogUser::find(1);
        $users = User::all();
        $mensajes = DB::table('mensajes')->take(125)->where('takeBy', '=', Auth::user()->id)->orderBy('created_at' , 'desc')->get();
        return view('admin/eventos' , ['categorias' => $categorias, 'notifications' => $notifications , 'logUser' => $logUser , 'users' => $users , 'mensajes' => $mensajes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $evento= new Evento;
      $evento->title= $request->name;
      $evento->content= $request->address;
      $evento->phone= $request->phone;
      if($evento->save()) {
        Flash::success(' Se guardó el evento exitosamente. ');
      } else {
        Flash::error(' Se produjó un problema al crear el evento. ');
      }
      return redirect('admin/evento');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Add a new notification
     *
     * @param  String  $title, $content
     */
    private function addnotification($title, $content)
    {
        $notification = new Notification();
        $notification->title = $title;
        $notification->content = $content;
        $notification->user_id = Auth::user()->id;
        $notification->save();

        $users = User::all();
        foreach ($users as $user) {
            if($user->id != Auth::user()->id){
                $user->notification = $user->notification + 1;
                $user->save();  
            }
        }
    }
}
