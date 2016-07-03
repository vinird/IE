<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// added
use App\Categoria;
use App\Notification;
use App\Evento;
use App\Sede;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;
use Storage;
use File;
use App\User;
use App\LogUser;


class Eventos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        $notifications = Notification::take(25)->orderBy('created_at', 'desc')->get();
        $users = User::select('id' , 'name' )->get();
        $sedes = Sede::select('id' , 'name' )->get();
        $logUser = LogUser::find(1);
        if (Auth::user()->userType == 1) {
          $eventos = Evento::all();
        } else {
          $eventos = DB::table('eventos')->where('user_id', '=', Auth::user()->id)->get();
          $eventos = collect($eventos);
        }
        return view('admin/eventos' , ['categorias' => $categorias, 'notifications' => $notifications , 'logUser' => $logUser, 'eventos' => $eventos, 'users' => $users, 'sedes' => $sedes]);
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
        if($request->title === '' || $request->date === '' || $request->content === '' || $request->sede === '') {
          Flash::error(' Algunos datos son requeridos, por favor insértelos. ');
          return $this->index();
        }
        $evento= new Evento;
        $evento->title= $request->title;
        $evento->content= $request->content;
        $evento->event_date= $request->date;
        if($request->org !== '') {
          $evento->org= $request->org;
        } else {
          $evento->org= Auth::user()->name;
        }
        $evento->user_id= Auth::user()->id;
        $evento->sede_id= $request->sede;
        $file= $request->file('file');
        if($file != null) {
          $file_route = time().'_'.$file->getClientOriginalName();

          if(Storage::disk('evento/archivo')->put($file_route, file_get_contents($file->getRealPath()))) {
            $evento->url_document= $file_route;
          } else {
            Flash::error(' Error al guardar el archivo en los eventos. ');
          }
        }
        $img= $request->file('img');
        if($img != null) {
          $img_route = time().'_'.$img->getClientOriginalName();

          if(Storage::disk('evento/img')->put($img_route, file_get_contents($img->getRealPath()))){
            $evento->url_img= $img_route;
          } else {
            Flash::error(' Error al guardar la imagen en los eventos. ');
          }
        }
        if($evento->save()) {
          Flash::success(' Se guardó el evento exitosamente. ');
          $this->addnotification('Se agregó un nuevo evento ', $request->title);
        } else {
          Flash::error(' Se produjó un problema al crear el evento. ');
        }
        return $this->index();
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

    public function modify(Request $request)
    {
        if(Hash::check($request->password, Auth::user()->password)) {
          if($request->title === '' || $request->date === '' || $request->content === '' || $request->sede === '') {
            Flash::error(' Algunos datos son requeridos, por favor insértelos. ');
            return $this->index();
          }
          $evento= Evento::find($request->id);
          $evento->title= $request->title;
          $evento->content= $request->content;
          $evento->event_date= $request->date;
          if($request->org !== '') {
            $evento->org= $request->org;
          } else {
            $evento->org= Auth::user()->name;
          }
          $evento->user_id= Auth::user()->id;
          $evento->sede_id= $request->sede;
          $file= $request->file('file');
          if($file != null) {
            $file_route = time().'_'.$file->getClientOriginalName();

            if(Storage::disk('evento/archivo')->put($file_route, file_get_contents($file->getRealPath()))) {
              Storage::disk('evento/archivo')->delete($evento->url_document);
              $evento->url_document= $file_route;
            } else {
              Flash::error(' Error al guardar el archivo en los eventos. ');
            }
          }
          $img= $request->file('img');
          if($img != null) {
            $img_route = time().'_'.$img->getClientOriginalName();

            if(Storage::disk('evento/img')->put($img_route, file_get_contents($img->getRealPath()))){
              Storage::disk('evento/img')->delete($evento->url_document);
              $evento->url_img= $img_route;
            } else {
              Flash::error(' Error al guardar la imagen en los eventos. ');
            }
          }
          if($evento->save()) {
            Flash::success(' Se modificó el evento exitosamente. ');
            $this->addnotification("Evento modificada ", $request->title);
          } else {
            Flash::error(' Se produjó un problema al modificar el evento. ');
          }
        } else {
          Flash::error(' Contraseña incorrecta. ');
        }
        return  $this->index();
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

    public function delete(Request $request)
    {
        if(Hash::check($request->password, Auth::user()->password)) {
          $evento = Evento::find($request->id);
          if(Evento::destroy($request->id) == 1){
            Storage::disk('evento/archivo')->delete($evento->url_document);
            Storage::disk('evento/img')->delete($evento->url_img);
            Flash::success(' Evento eliminado exitosamente. ');
            $this->addnotification("Evento eliminado ", $evento->title);
          } else {
            Flash::error(' Error al eliminar el evento. ');
          }
        } else {
          Flash::error(' Contraseña invalida. ');
        }
        return $this->index();
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
