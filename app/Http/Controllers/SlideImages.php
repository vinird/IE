<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SlideImage;
use Intervention\Image\Facades\Image;
use Storage;

class SlideImages extends Controller
{
    public function index(){
    	return view('index' , ['homeActive' => true , 'slideImages' => SlideImage::all()]);
    }

    public function store(Request $request){
    	$this->validate($request, [
            'file' => 'image',
        ]);

        $slideImage = new SlideImage;

    	$file = $request->file('file');
        $file_route = time().'_'.$file->getClientOriginalName();
        $image = Image::make($request->file('file'))->resize(1900, 530)->save($file_route);
        $icon = Image::make($request->file('file'))->resize(410, 115)->save('icon_'.$file_route);

        $slideImage->url = $image->basename;
        $slideImage->icon = $icon->basename;

        if($slideImage->save()){
        	Storage::disk('slideImages')->put( $image->basename , $image );
        	Storage::disk('slideImages')->put( $icon->basename , $icon );
        }
        return back();
    }

    public function delete($id){
    	if($slideImage = SlideImage::find($id)){
			Storage::disk('slideImages')->delete($slideImage->url);
			Storage::disk('slideImages')->delete($slideImage->icon);

			SlideImage::destroy($id);
    	}

		return back();
    }
}
