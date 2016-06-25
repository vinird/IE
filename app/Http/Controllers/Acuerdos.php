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
        $acuerdos = Acuerdo::take(25)->get();
        $users = User::all();
        return view('admin/acuerdos' , ['categorias' => $categorias , 'users' => $users , 'acuerdos' => $acuerdos]);
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
        // dd($request->date);
        if($request->title == "" || $request->contenido == "" || $request->date == "") {
            Flash::error(' Debe ingresar todos los datos. ');
            if ($request->main == "true"){
                return redirect('/admin/main');
            } else {
                return $this->index();
            }
        }


        $acuerdo = new Acuerdo();
        $acuerdo->title         = $request->title;
        $acuerdo->content       = $request->contenido;
        $acuerdo->mainUser_id   = Auth::user()->id;
        $acuerdo->mainUser_name = Auth::user()->name;
        // $acuerdo->primaryUser_id= 1;
        $acuerdo->agreement_date= $request->date;
        
        if($acuerdo->save()){
            Flash::success(' Acuerdo agregado exitosamente. ');
        } else {
            Flash::error(' Ocurrio un problema al agregar el acuerdo. ');
        }
        if ($request->main == "true"){
            return redirect('/admin/main');
        } else {
            return $this->index();
        }
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
        if(Hash::check($request->password, Auth::user()->password)) {
            if(Acuerdo::destroy($request->id)){
                Flash::success(' Acuerdo eliminado exitosamente. ');
            } else {
                Flash::error(' Error al eliminar el acuerdo. ');
            }
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
    public function complete(Request $request)
    {
        if(Hash::check($request->password, Auth::user()->password)) {
            $acuerdo = Acuerdo::find($request->id);
            $acuerdo->complete = 1;
            if($acuerdo->save()){
                Flash::success(' Acuerdo finalizado exitosamente. ');
            } else {
                Flash::error(' Error al finalizar el acuerdo. ');
            }
        } else {
            Flash::error(' Contraseña invalida. ');
        }
        return $this->index();
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
                return $this->index();
            }
            $acuerdo = Acuerdo::find($request->id);
            $acuerdo->content       = $request->contenido;
            $acuerdo->agreement_date= $request->date;

            if($acuerdo->save()){
                Flash::success(' Acuerdo modificado exitosamente. ');
            } else {
                Flash::error(' Ocurrio un problema al modificar el acuerdo. ');
            }
        } else {
            Flash::error(' Contraseña invalida. ');
        }
        return $this->index();
    }

    
}
