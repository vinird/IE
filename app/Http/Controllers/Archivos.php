<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//added
use App\Archivo;
use App\Categoria;
use Laracasts\Flash\Flash;
use Storage;
use File;
use Illuminate\Support\Facades\Auth;
use App\User;
use Hash;
use DB;
use App\Notification;
use App\LogUser;

class Archivos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $archivos   = Archivo::all();
        $categorias = Categoria::all();
        $notifications = Notification::take(25)->orderBy('created_at', 'desc')->get();
        $users = User::select('id' , 'name' )->get();
        $logUser = LogUser::find(1);
        $mensajes = DB::table('mensajes')->take(125)->where('takeBy', '=', Auth::user()->id)->orderBy('created_at' , 'desc')->get();
        return view('admin.repositorio' , [ 'categorias' =>  $categorias , 'archivos' => $archivos , 'users' => $users, 'notifications' => $notifications , 'logUser' => $logUser , 'mensajes' => $mensajes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return $this->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->title == '' || $request->category == '' || $request->resumen == ''){
            Flash::error(' Debe ingresar todos los datos. ');
            return $this->index();
        }

        $file = $request->file('file');
        if($file != null) {
            // toda la logica aqui 
            $file_route = time().'_'.$file->getClientOriginalName();

            $archivo                = new Archivo();
            $archivo->name          = $file->getClientOriginalName();
            $archivo->title         = $request->title;
            $archivo->file_route    = $file_route;
            $archivo->categoria_id  = $request->category;
            $archivo->extension     = File::extension($file->getClientOriginalName());
            $archivo->keyWords      = $request->resumen;
            $archivo->editable      = $request->editable; 
            $archivo->user_id       = Auth::user()->id;
            
            if(Storage::disk('repositorio')->put( $file_route , file_get_contents($file->getRealPath()))){
                Flash::success(' Archivo guardado exitosamente. ');
                if($archivo->save()){
                    Flash::success(' Archivo agregado exitosamente. ');
                    $this->addnotification("Nuevo archivo en el repositorio", $file->getClientOriginalName());
                } else{
                    Flash::error(' Error al agregar la información del archivo a la base de datos. ');
                }
            } else {
                Flash::error(' Error al guardar el archivo en el repositorio. ');
            }

        } else {
            Flash::error(' Debe seleccionar un archivo. ');
        }
        return redirect($request->url);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {   
        if(Auth::user()->userType != 1 && $request->userFileID != Auth::user()->id){
            Flash::error(' No tiene permisos para realizar esta acción. ');
            return $this->index();
        }

        if(Hash::check($request->password, Auth::user()->password)) {
            $arch = Archivo::find($request->id);
            if(Archivo::destroy($request->id) == 1){
                Storage::disk('repositorio')->delete($request->fileUrl);
                Flash::success(' Archivo eliminado exitosamente. ');
                $this->addnotification("Archivo eliminado del repositorio", $arch->name);
            } else {
                Flash::error(' Error al eliminar el archivo. ');
            }
        } else {
            Flash::error(' Contraseña invalida. '); 
        }
        return redirect($request->url);
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function indexCategory($id)
    {
        $archivos = DB::table('archivos')->where('categoria_id', '=', $id)->get();

        $collection = collect($archivos);

        $categorias = Categoria::all();
        $currentCategory = Categoria::find($id);
        $users      = User::select('id' , 'name' )->get();
        $notifications = Notification::take(25)->orderBy('created_at', 'desc')->get();
        $logUser = LogUser::find(1);
        return view('admin.repositorio' , [ 'categorias' =>  $categorias , 'currentCategory' => $currentCategory , 'archivos' => $collection , 'users' => $users, 'notifications' => $notifications , 'logUser' => $logUser]);
    }



     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getFileRepositorio($id)
    {
        $exists = Storage::disk('repositorio')->exists($id);
        if($exists){
            return response()->file(storage_path().'/app/public/repositorio/'.$id);
        } else {
            Flash::error(' El archivo no se encuentra en el repositorio. ');
            return $this->index();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateData(Request $request)
    {
        if($request->title == '' || $request->category == '' || $request->resumen == ''){
            Flash::error(' Debe ingresar todos los datos. ');
            return $this->index();
        }
        
        if(Hash::check($request->password, Auth::user()->password)) {

            $file = $request->file('file');
            if($file != null) {
                // toda la logica aqui
                $file_route = time().'_'.$file->getClientOriginalName();

                $archivo                = Archivo::findOrFail($request->id);
                $archivo->name          = $file->getClientOriginalName();
                $archivo->title         = $request->title;
                $archivo->file_route    = $file_route;
                $archivo->categoria_id  = $request->category;
                $archivo->extension     = File::extension($file->getClientOriginalName());
                $archivo->keyWords      = $request->resumen;
                $archivo->user_id       = Auth::user()->id;
                
                if(Storage::disk('repositorio')->put( $file_route , file_get_contents($file->getRealPath()))){
                    Flash::success(' Archivo guardado exitosamente. ');
                    Storage::disk('repositorio')->delete($request->url);
                    $this->addnotification("Archivo modificado en el repositorio",$file->getClientOriginalName());
                } else {
                    Flash::error(' Error al guardar el archivo en el repositorio. ');
                }
                if($archivo->save()){
                    Flash::success(' Archivo agregado exitosamente. ');
                } else{
                    Flash::error(' Error al agregar la información del archivo a la base de datos. ');
                }
            } else {
                Flash::error(' Debe seleccionar un archivo. ');
            }
        } else {
            Flash::error(' Contraseña incorrecta. ');
        }
        return redirect($request->url);
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
