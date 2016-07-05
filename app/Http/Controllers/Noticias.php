<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// added
use App\Categoria;
use App\Notification;
use App\Noticia;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;
use Storage;
use File;
use App\User;
use App\LogUser;
use Illuminate\Support\Facades\Redirect;


class Noticias extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        $notifications = Notification::take(35)->orderBy('created_at', 'desc')->get();
        $mensajes = DB::table('mensajes')->take(125)->where('takeBy', '=', Auth::user()->id)->orderBy('created_at' , 'desc')->get();
        $users = User::all();
        $logUser = LogUser::find(1);
        $noticias = Noticia::take(250)->orderBy('updated_at', 'desc')->get();
        return view('admin/noticias' , ['categorias' => $categorias, 'notifications' => $notifications , 'logUser' => $logUser, 'mensajes' => $mensajes, 'noticias' => $noticias, 'users' => $users]);
    }

    public function indexInformativa()
    {
        $noticias = DB::table('noticias')->orderBy('updated_at', 'desc')->paginate(6);
        return view('informativa.noticias' , ['noticias' => $noticias, 'noticiasActive' => true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->title === '' || $request->content === '') {
          Flash::error(' Algunos datos son requeridos, por favor insértelos. ');
          return Redirect::action('Noticias@index');
        }
        $noticia= new Noticia;
        $noticia->title= $request->title;
        $noticia->content= $request->content;
        if($request->author !== '') {
          $noticia->auth= $request->author;
        } else {
          $noticia->auth= Auth::user()->name;
        }
        $noticia->user_id= Auth::user()->id;
        $file= $request->file('file');
        if($file != null) {
          $file_route = time().'_'.$file->getClientOriginalName();

          if(Storage::disk('noticia/archivo')->put($file_route, file_get_contents($file->getRealPath()))) {
            $noticia->url_document= $file_route;
          } else {
            Flash::error(' Error al guardar el archivo en las noticias. ');
          }
        }
        $img= $request->file('img');
        if($img != null) {
          $img_route = time().'_'.$img->getClientOriginalName();

          if(Storage::disk('noticia/img')->put($img_route, file_get_contents($img->getRealPath()))){
            $noticia->url_img= $img_route;
          } else {
            Flash::error(' Error al guardar la imagen en las noticias. ');
          }
        }
        if($noticia->save()) {
          Flash::success(' Se guardó la noticia exitosamente. ');
          $this->addnotification('Se agregó una nueva noticia ', $request->title);
        } else {
          Flash::error(' Se produjó un problema al crear la noticia. ');
        }
        return Redirect::action('Noticias@index');
    }


    public function modify(Request $request)
    {
        if(Hash::check($request->password, Auth::user()->password)) {
          if($request->title === '' || $request->content === '') {
            Flash::error(' Algunos datos son requeridos, por favor insértelos. ');
            return Redirect::action('Noticias@index');
          }
          $noticia= Noticia::find($request->id);
          $noticia->title= $request->title;
          $noticia->content= $request->content;
          if($request->author !== '') {
            $noticia->auth= $request->author;
          } else {
            $noticia->auth= Auth::user()->name;
          }
          $noticia->user_id= Auth::user()->id;
          $file= $request->file('file');
          if($file != null) {
            $file_route = time().'_'.$file->getClientOriginalName();

            if(Storage::disk('noticia/archivo')->put($file_route, file_get_contents($file->getRealPath()))){
              Storage::disk('noticia/archivo')->delete($noticia->url_document);
              $noticia->url_document= $file_route;
            } else {
              Flash::error(' Error al guardar el archivo en las noticias. ');
            }
          }
          $img= $request->file('img');
          if($img != null) {
            $img_route = time().'_'.$img->getClientOriginalName();

            if(Storage::disk('noticia/img')->put($img_route, file_get_contents($img->getRealPath()))){
              Storage::disk('noticia/img')->delete($noticia->url_img);
              $noticia->url_img= $img_route;
            } else {
              Flash::error(' Error al guardar la imagen en las noticias. ');
            }
          }
          if($noticia->save()) {
            Flash::success(' Se modificó la noticia exitosamente. ');
            $this->addnotification('Se modificó una noticia ', $request->title);
          } else {
            Flash::error(' Se produjó un problema al modificar la noticia. ');
          }
        } else {
          Flash::error(' Contraseña incorrecta. ');
        }
        return  Redirect::action('Noticias@index');
    }

    public function delete(Request $request)
    {
        if(Hash::check($request->password, Auth::user()->password)) {
          $noticia = Noticia::find($request->id);
          if(Auth::user()->userType != 1 && $noticia->user_id != Auth::user()->id){
            Flash::error(' No tiene permisos para realizar esta acción. ');
            return Redirect::action('Noticias@index');
          }
          if(Noticia::destroy($request->id) == 1){
            Storage::disk('noticia/archivo')->delete($noticia->url_document);
            Storage::disk('noticia/img')->delete($noticia->url_img);
            Flash::success(' Noticia eliminada exitosamente. ');
            $this->addnotification('Se eliminó una noticia ', $noticia->title);
          } else {
            Flash::error(' Error al eliminar la noticia. ');
          }
        } else {
          Flash::error(' Contraseña invalida. ');
        }
        return Redirect::action('Noticias@index');
    }

    public function getFileNoticia($id)
    {
        $exists = Storage::disk('noticia/archivo')->exists($id);
        if($exists){
          return response()->file(storage_path().'/app/public/noticias/'.$id);
        } else {
          Flash::error(' El archivo no se encuentra en el repositorio. ');
          return back();
        }
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
