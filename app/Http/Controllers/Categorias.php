<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//added
use App\Categoria;
use Laracasts\Flash\Flash;
use App\Archivo;

class Categorias extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        Flash::error('Debe ingresar el nombre de la categria y debe ser diferente a las existentes.');
        $this->validate($request, [
            'name' => 'required|max:255|unique:categorias,name',
            'color' => 'required',
        ]);
        $categoria = new Categoria();
        $categoria->name = $request->name;
        $categoria->color = $request->color;
        if($categoria->save()){
            Flash::success(' Categria agregada exitosamente.');
        } else {
            Flash::error('Algo salió mal al insertar los datos.');  
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
        $archivos = Archivo::select('categoria_id')->get();

        for ($i=0; $i < count($archivos) ; $i++) { 
            if($archivos[$i]->categoria_id == $request->id){
                Flash::error('Esta categoria esta asignada a algún archivo, no se puede eliminar.');   
                return redirect('/admin/repositorio');
            }
        }
        if(Categoria::destroy($request->id)){
            Flash::success(' Categria eliminada exitosamente.');
        } else {
            Flash::error('Error al eliminar la categoria.');   
        }
        return redirect($request->url);
    }
}
