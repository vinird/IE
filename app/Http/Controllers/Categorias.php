<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//added
use App\Categoria;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use App\Archivo;
use App\User;
use App\Notification;

class Categorias extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Flash::error(' Debe ingresar el nombre de la categoría y debe ser diferente a las existentes. ');
        $this->validate($request, [
            'name' => 'required|max:255|unique:categorias,name',
            'color' => 'required',
        ]);
        $categoria = new Categoria();
        $categoria->name = $request->name;
        $categoria->color = $request->color;
        if($categoria->save()){
            Flash::success(' Categoría agregada exitosamente. ');
            $this->addnotification('Se agregó una nueva categoría ', $request->name);
        } else {
            Flash::error(' Algo salió mal al insertar los datos. ');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $archivos = Archivo::select('categoria_id')->get();

        for ($i=0; $i < count($archivos) ; $i++) {
            if($archivos[$i]->categoria_id == $request->id){
                Flash::error(' Esta categoría esta asignada a algún archivo, no se puede eliminar. ');
                return redirect('/admin/repositorio');
            }
        }
        $categ = Categoria::find($request->id);
        if(Categoria::destroy($request->id)){
            Flash::success(' Categoría eliminada exitosamente. ');
            $this->addnotification('Se eliminó una categoría ', $categ->name);
        } else {
            Flash::error(' Error al eliminar la categoría. ');
        }
        return back();
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
