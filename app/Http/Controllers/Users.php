<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/// added

use App\User;
use Hash;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use App\Categoria;
use Storage;
use App\Notification;
use App\LogUser;
use Illuminate\Support\Facades\Redirect;
use DB;
use Intervention\Image\Facades\Image;
use App\Sede;


class Users extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $categorias = Categoria::all();
        $notifications = Notification::take(35)->orderBy('created_at', 'desc')->get();
        $logUser = LogUser::find(1);
        $mensajes = DB::table('mensajes')->take(125)->where('takeBy', '=', Auth::user()->id)->orderBy('created_at' , 'desc')->get();
        return view('admin/users' , ['users' => $users , 'categorias' => $categorias, 'notifications' => $notifications , 'logUser' => $logUser , 'mensajes' => $mensajes , 'sedes' => Sede::all()]);
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
        if (Hash::check($request->password, Auth::user()->password)) {
            if($request->name == "" || $request->phone == "" || $request->sede == "" || $request->email == ""){
                Flash::error(' Debe ingresar todos los datos. ');
                return back();
            }
            $user = User::find($id);
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->sede_id = $request->sede;
            $user->email = $request->email;


            if($user->save()){
                Flash::success(' Se modificó el usuario exitosamente. ');
            } else {
                Flash::error(' Error al modificar el usuario. ');
            }
        } else {
            Flash::error(' Contraseña incorrecta. ');
            return back();
        }
       return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request, $id )
    {
        $user = User::find($id);
        Flash::error(' Contraseña invalida. ');
        if (Hash::check($request->password, $user->password)) {
            Flash::error(' Las contraseñas no coinciden. ');
            if($request->newPassword == $request->confirmPassword){
                $user->password = bcrypt($request->newPassword);
                $user->save();
                Flash::success(' Se modificó la contraseña exitosamente. ');
            }
        }
        return back();
    }


     /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        if($request->id == Auth::user()->id){
            Flash::error(' No puede eliminar su propio usuario. ');
            return back();
        }
        if (Hash::check($request->password, Auth::user()->password)) {
            $user = User::find($request->id);
            if($user->isNew == 1){
                $log = LogUser::find(1);
                $log->count = $log->count - 1;
                $log->save();
            }
            if(User::destroy($request->id) == 1){
                Flash::success(' Se eliminó el usuario correctamente. ');
            } else {
                Flash::error(' Se produjó un problema al eliminar el usuario. ');
            }
        } else {
            Flash::error(' Contraseña invalida. ');
        }
        return back();
    }


     /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function activateUser(Request $request)
    {
        if($request->id == Auth::user()->id){
            Flash::error(' No puede desactivar su propio usuario. ');
            return back();
        }
        if (Hash::check($request->password, Auth::user()->password)) {
            $user = User::find($request->id);
            if ($request->activate == 1){
                $user->active = 1;
                Flash::success(' Se activó el usuario correctamente. ');
                if($user->isNew == 1){
                    $user->isNew = 0;
                    $log = LogUser::find(1);
                    $log->count = $log->count - 1;
                    $log->save();
                }
                $this->addnotification('Se activó un usuario ', $user->name);
            } else {
                $user->active = 0;
                Flash::success(' Se desactivó el usuario correctamente. ');
                $this->addnotification('Se desactivó un usuario ', $user->name);
            }
            if($user->save() != true) Flash::error(' Error al cambiar el estado del usuario. ');
        } else {
            Flash::error(' Contraseña invalida. ');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function modifyIMG(Request $request)
    {
        // resize image
        //
        $this->validate($request, [
            'file' => 'image',
        ]);
        $newImage = Image::make($request->file('file'))->resize(300, 300)->save('img/users/'.time().'_'.'user_img.jpg');

        // dd($newImage->basename);

        $user = User::find(Auth::user()->id);

        // $file = $request->file('imgUsers');
        // $file_route = time().'_'.$file->getClientOriginalName();
        $user->img = $newImage->basename;

        if($user->save()){
            Storage::disk('userPhotos')->delete(Auth::user()->img);
            Flash::success(' Imagen guardada exitosamente. ');
        } else {
            Flash::error(' Error al guardar la imagen. ');
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

    /**
     *
     *
     *
     */
    public function clearNewUsers()
    {
        $this->clearNewU();
        return Redirect::back();
    }

    /**
     *
     *
     *
     */
    private function clearNewU(){
        $loguser = LogUser::find(1);
        $loguser->count = 0;
        $loguser->save();
        $users = User::all();

        foreach ($users as $u ) {
            if ($u->isNew == 1) {
                $u->isNew = 0;
                $u->save();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAll(Request $request)
    {
        if (Hash::check($request->password, Auth::user()->password)) {
            if (Auth::user()->userType == 1) {
                $users = User::all();
                foreach ($users as $u) {
                    if ($u->active != 1) {
                        User::destroy($u->id);
                    }
                }
                Flash::success(' Usuarios eliminados exitosamente. ');
                $this->clearNewU();
            } else {
                Flash::error(' No tiene permisos para realizar esta acción. ');
            }
        } else {
            Flash::error(' Contraseña invalida. ');
        }
        return Redirect::back();
    }

}
