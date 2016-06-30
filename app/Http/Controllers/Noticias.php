<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// added
use Laracasts\Flash\Flash;
use App\Noticia;
use App\Categoria;
use Storage;
use File;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\LogUser;


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
        $noticias = Noticia::all();
        $notifications = Notification::take(25)->orderBy('created_at', 'desc')->get();
        $logUser = LogUser::find(1);
        return view('admin/noticias' , ['categorias' => $categorias, 'notifications' => $notifications , 'logUser' => $logUser, 'noticias' => $noticias]);
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
      $noticia= new Noticia;
      $noticia->title= $request->title;
      $noticia->content= $request->content;
      $noticia->auth= $request->author;
      $noticia->user_id= Auth::user()->id;
      $file= $request->file('file');
      if($file != null) {
          $file_route = time().'_'.$file->getClientOriginalName();

          if(Storage::disk('noticia/archivo')->put($file_route, file_get_contents($file->getRealPath()))){
              $noticia->url_document= $file_route;
          }
      }
      $img= $request->file('img');
      if($img != null) {
          $img_route = time().'_'.$img->getClientOriginalName();

          if(Storage::disk('noticia/img')->put($img_route, file_get_contents($img->getRealPath()))){
              $noticia->url_img= $img_route;
          }
      }
      if($noticia->save()) {
        Flash::success(' Se guardó la noticia exitosamente. ');
      } else {
        Flash::error(' Se produjó un problema al crear la noticia. ');
      }
      return  $this->index();
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
