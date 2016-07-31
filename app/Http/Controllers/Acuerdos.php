<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// added

use App\Categoria;
use App\User;
use App\Acuerdo;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Hash;
use App\Notification;
use App\LogUser;
use Storage;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Seguimiento;


class Acuerdos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        $acuerdos = Acuerdo::take(125)->orderBy('created_at', 'desc')->get();
        $users = User::all();
        $notifications = Notification::take(35)->orderBy('created_at', 'desc')->get();
        $logUser = LogUser::find(1);
        $mensajes = DB::table('mensajes')->take(125)->where('takeBy', '=', Auth::user()->id)->orderBy('created_at' , 'desc')->get();
        $seguimientos = Seguimiento::take(999999)->orderBy('created_at', 'acuerdo_id', 'asc')->get();
        return view('admin/acuerdos' , ['categorias' => $categorias , 'users' => $users , 'acuerdos' => $acuerdos, 'notifications' => $notifications , 'logUser' => $logUser , 'mensajes' => $mensajes , 'seguimientos' => $seguimientos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->title == "" || $request->contenido == "" || $request->date == "") {
            Flash::error(' Debe ingresar todos los datos. ');
            if ($request->main == "true"){
                return redirect('/admin/main');
            } else {
                return Redirect::action('Acuerdos@index');
            }
        }
        $acuerdo = new Acuerdo();

        $file = $request->file('file');
        if($file != null) {
            // toda la logica aqui
            $file_route = time().'_'.$file->getClientOriginalName();
            $acuerdo->file_url = $file_route;
            Storage::disk('acuerdos')->put($file_route , file_get_contents($file->getRealPath()));
        }

        $acuerdo->title         = $request->title;
        $acuerdo->content       = $request->contenido;
        $acuerdo->mainUser_id   = Auth::user()->id;
        $acuerdo->mainUser_name = Auth::user()->name;
        if($request->primaryUser_id != ""){
            $acuerdo->primaryUser_id= $request->primaryUser_id;
        }
        $acuerdo->agreement_date= $request->date;

        if($acuerdo->save()){
            Flash::success(' Acuerdo agregado exitosamente. ');
            $this->addnotification('Se agregó un nuevo acuerdo ', $request->title);
        } else {
            Flash::error(' Ocurrió un problema al agregar el acuerdo. ');
        }
        if ($request->main == "true"){
            return redirect('/admin/main');
        } else {
            return Redirect::action('Acuerdos@index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        if(Hash::check($request->password, Auth::user()->password)) {
            $acuer = Acuerdo::find($request->id);
            Storage::disk('acuerdos')->delete($acuer->file_url);
            if(Acuerdo::destroy($request->id)){
                Flash::success(' Acuerdo eliminado exitosamente. ');
                $this->addnotification('Se eliminó un acuerdo ', $acuer->title);
            } else {
                Flash::error(' Error al eliminar el acuerdo. ');
            }
        } else {
            Flash::error(' Contraseña invalida. ');
        }
        return Redirect::action('Acuerdos@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function complete(Request $request)
    {
        if(Hash::check($request->password, Auth::user()->password)) {
            $acuerdo = Acuerdo::find($request->id);
            $acuerdo->complete = 1;
            if($acuerdo->save()){
                Flash::success(' Acuerdo finalizado exitosamente. ');
                $this->addnotification('Se completó un acuerdo ', $acuerdo->title);
            } else {
                Flash::error(' Error al finalizar el acuerdo. ');
            }
        } else {
            Flash::error(' Contraseña invalida. ');
        }
        return Redirect::action('Acuerdos@index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function modify(Request $request)
    {
        if(Hash::check($request->password, Auth::user()->password)) {
            if($request->contenido == "" || $request->date == "") {
                Flash::error(' Debe ingresar todos los datos. ');
                return Redirect::action('Acuerdos@index');
            }
            $acuerdo = Acuerdo::find($request->id);
            $acuerdo->content       = $request->contenido;
            $acuerdo->agreement_date= $request->date;

                $file = $request->file('file');
                if($file != null) {
                    // toda la logica aqui
                    Storage::disk('acuerdos')->delete($acuerdo->file_url);
                    $file_route = time().'_'.$file->getClientOriginalName();
                    $acuerdo->file_url = $file_route;
                    Storage::disk('acuerdos')->put($file_route , file_get_contents($file->getRealPath()));
                }

                if($request->primaryUser_id != ""){
                    $acuerdo->primaryUser_id= $request->primaryUser_id;
                }

            if($acuerdo->save()){
                Flash::success(' Acuerdo modificado exitosamente. ');
                $this->addnotification('Se modificó un acuerdo ', $acuerdo->title);
            } else {
                Flash::error(' Ocurrió un problema al modificar el acuerdo. ');
            }
        } else {
            Flash::error(' Contraseña invalida. ');
        }
        return Redirect::action('Acuerdos@index');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getFileAcuerdos($id)
    {
        $exists = Storage::disk('acuerdos')->exists($id);
        if($exists){
            return response()->file(storage_path().'/app/public/acuerdos/'.$id);
        } else {
            Flash::error(' El archivo no se encuentra en el repositorio. ');
            return Redirect::action('Acuerdos@index');
        }
    }

     /**
     * Show the form for open an old acuerdo.
     *
     * @param  Request
     * @return \Illuminate\Http\Response
     */
    public function open(Request $request)
    {
        if(Hash::check($request->password, Auth::user()->password)) {
            $acuerdo = Acuerdo::find($request->id);
            $acuerdo->complete = null;
            $title = $acuerdo->title;
            if($acuerdo->save()){
                Flash::success(' Acuerdo reabierto exitosamente. ');
                $this->addnotification('Se reabrió un acuerdo ', $title);
            } else {
                Flash::error(' Error al reabrir el acuerdo. ');
            }
        } else {
            Flash::error(' Contraseña invalida. ');
        }
        return Redirect::action('Acuerdos@index');
    }

    public function agregarSeguimiento(Request $request) {
        if($request->title == "" || $request->content ==""){
            Flash::error(' Debe ingresar el título y la descripción. ');
            return back();
        }
        $seguimiento = new Seguimiento();
        $seguimiento->acuerdo_id = $request->acuerdo_id;
        $seguimiento->title = $request->title;
        $seguimiento->content = $request->content;

        $acuerdo = Acuerdo::find($request->acuerdo_id);
        
        if($seguimiento->save()){
            Flash::success(' Seguimiento agregado exitosamente. ');
            $this->addnotification('Se agregó un seguimiento al acuerdo '.$acuerdo->title, $request->title);
        } else {
            Flash::error(' Error al agregar el seguimiento. ');
        }
        return back();
    }

    public function modificarSeguimiento(Request $request) {
        if(Hash::check($request->password, Auth::user()->password)) {
            if($request->content == ""){
                Flash::error(' Debe agregar la descripción. ');
                return back();
            }
            $seguimiento = Seguimiento::find($request->id);
            $seguimiento->content = $request->content;

            $acuerdo = Acuerdo::find($seguimiento->acuerdo_id);

            if($seguimiento->save()){
                Flash::success(' Seguimiento modificado exitosamente. ');
                $this->addnotification('Se modificó un seguimiento al acuerdo '.$acuerdo->title, $seguimiento->title);
            }
        } else {
            Flash::error(' Contraseña invalida. ');
        }

        return back();
    }

    public function eliminarSeguimiento(Request $request) {
        if(Hash::check($request->password, Auth::user()->password)) {
            
            $seguimiento = Seguimiento::find($request->id);
            $acuerdo = Acuerdo::find($seguimiento->acuerdo_id);

            if(Seguimiento::destroy($request->id)){
                Flash::success(' Seguimiento eliminado exitosamente. ');
                $this->addnotification('Se eliminó un seguimiento al acuerdo '.$acuerdo->title, $seguimiento->title);
            }
        } else {
            Flash::error(' Contraseña invalida. ');
        }
        return back();
    }
}
