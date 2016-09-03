<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Token;
use Illuminate\Support\Facades\Hash;
use Laracasts\Flash\Flash;

class Tokens extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getValue(Request $request)
    {
        $token = Token::find(1);

        if (Hash::check($request->token, $token->token)) {
        return view('auth.login');
    // The passwords match...
        }
        Flash::error(' Token incorrecto. ');
        return back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function modify(Request $request)
    {
        $token = Token::find(1);
        // dd($token);
        if (Hash::check($request->token, $token->token)) {
            if ($request->token2 == $request->token3) {
                $token->token = Hash::make($request->token2);
                $token->save();
                Flash::success(' Token actualizado [ '.$request->token2.' ] ');
            } else {
                Flash::error(' Error, los datos no coinciden. ');
            }
        } else {
            Flash::error(' Error, el token ingresado es incorrecto. ');
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reset(Request $request)
    {
        $token = Token::find(1);
        $token->token = Hash::make("informatica2016");
        $token->save();
        Flash::success(' Token reiniciado [ informatica2016 ]. ');
        return back();
    }

}
