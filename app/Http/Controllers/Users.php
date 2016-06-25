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
        return view('admin/users' , ['users' => $users , 'categorias' => $categorias]);
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
        if (Hash::check($request->password, Auth::user()->password)) { 
            if($request->name == "" || $request->phone == "" || $request->sede == "" || $request->email == ""){
                Flash::error(' Debe ingresar todos los datos. ');
                return redirect('/admin/main');
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
            Flash::error(' Contraseña incorreta. ');
            return redirect('/admin/main');
        }
       return redirect('/admin/main');
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
        return redirect($request->url);
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
            return redirect($request->url);
        }
        if (Hash::check($request->password, Auth::user()->password)) { 
            if(User::destroy($request->id) == 1){
                Flash::success(' Se eliminó el usuario correctamente. ');
            } else {
                Flash::error(' Se produjó un problema al eliminar el usuario. ');
            }
        } else {
            Flash::error(' Contraseña invalida. ');
        }
        return redirect($request->url);
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
            return redirect($request->url);
        }
        if (Hash::check($request->password, Auth::user()->password)) { 
            $user = User::find($request->id);
            if ($request->activate == 1){
                $user->active = 1;
                Flash::success(' Se activó el usuario correctamente. ');
            } else {
                $user->active = 0;
                Flash::success(' Se desactivó el usuario correctamente. ');
            }
            if($user->save() != true) Flash::error(' Error al cambian el estado del usuario. ');
        } else {
            Flash::error(' Contraseña invalida. ');
        }
        return redirect($request->url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function modifyIMG(Request $request)
    { 
        $this->validate($request, [
            'imgUsers' => 'image',
        ]);
        dd($request->file('imgUsers'));
        $user = User::find(Auth::user()->id);

        $file = $request->file('imgUsers');
        $file_route = time().'_'.$file->getClientOriginalName();
        $user->img = $file_route;
///////////////////////
        // // $data = Input::all();
        // $png_url = "perfil-".time().".jpg";
        // // $path = public_path() . "/img/designs/" . $png_url;
        // $path = public_path() . $png_url;
        // // $img = $data['fileo'];
        // $img = $request->file('imgUsers');
        // $img = substr($img, strpos($img, ",")+1);
        // $data = base64_decode($img);
        // $success = file_put_contents($path,  file_get_contents($file->getRealPath()));
        // print $success ? $png_url : 'Unable to save the file.';
/////////////////////

        // $success = file_put_contents(public_path(), file_get_contents($file->getRealPath()));


        if(Storage::disk('userPhotos')->put( $file_route , file_get_contents($file->getRealPath()))){
            Storage::disk('userPhotos')->delete(Auth::user()->img);
            Flash::success(' Imagen guardada exitosamente. ');
            $user->save();
        } else {
            Flash::error(' Error al guardar la imagen. ');
        }
        return redirect('/admin/main');
    }
}
