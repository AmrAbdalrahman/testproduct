<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Image;

use App\Http\Requests;

class ProductController extends Controller
{
    public  function index(){
        return view('web.addproduct');
    }

    public function store (Requests\ProductRequest $productRequest, Product $product  ){

        if($productRequest->file('product_images')) {

          //    dd($productRequest->file('product_images'));
        //    foreach ()
            $filename = uploadImages($productRequest->file('product_images'));
            if (!$filename) {
                return redirect()->back()->with('flash_message', 'please choose another image less than 500*362');
            }
            $image = $filename;

    //    }
        }  else {
            $image = '';
        }

        $data= [
            'product_name' => $productRequest->product_name,
            'product_des' => $productRequest->product_des,
            'product_status' => $productRequest->product_status,
            'product_images' => $image

        ];
        $product->create($data);

        session()->flash('success',trans('main.account_loggedin'));


        return redirect()->back()->with('flash_message','Product has added successfully');;

    }

    public function showAllEnable(Product $product) {
        $productAll = $product->where('product_status',1)->orderBy('id','desc')->paginate(12);
        
        return view('welcome', compact('productAll'));
    }

    public function showproduct($id,Product $product,Image $image){

        $ProductInfo = $product->findOrFail($id);

        $images = $product->find($id)->images;
        // dd($images);

        return view('web.viewproduct', compact('ProductInfo','images'));
    }

    public function userEditProduct($id,Product $product){

      //  $user = Auth::user();
        $productInfo = $product->find($id);
            return view('web.editproduct',  compact('productInfo'));

    }

    public function userUpdateProduct($id,Requests\ProductRequest $request){

        $buupdate =  Product::find($id);
        $buupdate->fill(array_except($request->all(),['product_images']))->save();
        if($request->file('product_images')){
            $filename = uploadImages($request->file('product_images'));
            if(!$filename){
                return redirect()->back()->with('flash_message','please choose another image less than 500*362');
            }
            $buupdate->fill(['image' => $filename])->save();
        }
        return redirect()->back()->with('flash_message','Building Editing has done successfully');
    }

    public function destroy($id){
        Product::find($id)->delete();
        return redirect()->back()->with('flash_message','Product  has deleted successfully');
    }
}
