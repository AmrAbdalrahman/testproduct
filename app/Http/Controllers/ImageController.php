<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Image;
use App\Product;


class ImageController extends Controller
{

    public function index($id)
    {
         $pd = Product::find($id);
       // dd($pd);
        return view('web.imagesproduct.addnewimage',compact('pd'));
    }

    public function store(Requests\ImageRequest $request, Image $imagee,$id )
    {
        if($request->file('image')){
         //   dd($idd);
            $filename = uploadImages($request->file('image'));
            if(!$filename){
                return redirect()->back()->with('flash_message','please choose another image less than 500*362');
            }
            $image = $filename;
        }  else {
            $image = '';
        }
        $data= [
            'pu_id' => $id,
            'image' => $image
        ];
        $imagee->create($data);
        return redirect()->back()->with('flash_message','You just uploaded an image!');
    }
    public function editimage($id ,Image $image){

        $imageInfo = $image->find($id);
        return view('web.imagesproduct.editimage',compact('imageInfo'));
    }

    public function updateimage($id,Requests\ImageRequest $request){

        $buupdate =  Image::find($id);
        if($request->file('image')){
            $filename = uploadImages($request->file('image'));
            if(!$filename){
                return redirect()->back()->with('flash_message','please choose another image less than 500*362');
            }
            $buupdate->fill(['image' => $filename])->save();
        }
        return redirect()->back()->with('flash_message','Building Editing has done successfully');
    }

    public function destroy($id){
        Image::find($id)->delete();
        return redirect()->back()->with('flash_message','Product  has deleted successfully');
    }

}
