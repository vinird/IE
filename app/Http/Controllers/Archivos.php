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
        $users      = User::select('id' , 'name' )->get();
        return view('admin.repositorio' , [ 'categorias' =>  $categorias , 'archivos' => $archivos , 'users' => $users]);
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
            if(Archivo::destroy($request->id) == 1){
                Storage::disk('repositorio')->delete($request->fileUrl);
                Flash::success(' Archivo eliminado exitosamente. ');
            } else {
                Flash::error(' Error al eliminar el archivo. ');
            }
            return $this->index();
        } else {
            Flash::error(' Contraseña invalida. '); 
        }
        return $this->index();
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function indexCategory($id)
    {
        // $archivos = Archivo::where('id', $id)->first();
        // $archivos = DB::table('archivos')->where('categoria_id', $id);
        $archivos = DB::table('archivos')->where('categoria_id', '=', $id)->get();
        // $archivos = Archivo::all();
        // $archivos = $archivos->where('categoria_id', $id);
        // $archivos->all();

        $collection = collect($archivos);


        // $archivos = DB::table('archivos')
        //              ->select(DB::raw('*'))
        //              ->where('categoria_id', '=', $id)
                  
        //              ->get();

        // dd($collection);
        // $archivos->toJson();
        // dd($archivos);
        // $archivos   = Archivo::all();

        $categorias = Categoria::all();
        $users      = User::select('id' , 'name' )->get();
        return view('admin.repositorio' , [ 'categorias' =>  $categorias , 'archivos' => $collection , 'users' => $users ]);
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
        return $this->index();
    }
    

}
