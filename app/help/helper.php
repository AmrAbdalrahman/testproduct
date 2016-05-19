<?php

function checkIfImagesIsExit($imagename , $pathImage = '/public/images/products/',$url = '/images/products/'){


    if($imagename != ''){

        $path = base_path().$pathImage.$imagename;
        if(file_exists($path)){

            return Request::root().$url.$imagename;
        }
    }else {

        return "http://www.sakhihealthy.com/wp-content/uploads/2014/12/Lifestyle-nutrition-products-as-additional-nutrients.jpg";
    }
}

    function uploadImages($request,$path = '/public/images/products/',$width = '500',$height = '362',$deletefilrname = ' ' ){
    if($deletefilrname !=''){
    deleteImage(base_path().$path.'/'.$deletefilrname);

    }
    $filename = $request->getClientOriginalName();

    $request->move(
    base_path().$path, $filename
    );
    if($width == 500 && $height == 362){
    $thumpath =  base_path().'/public/images/thum/';

    $thumpathnew = $thumpath.$filename;
    Intervention\Image\Facades\Image::make(base_path().$path.'/'.$filename)->resize('500','362')->save($thumpathnew,100);
    if($deletefilrname !=''){
    deleteImage($thumpath.$deletefilrname);
    }
    }
    return $filename;
    }
function deleteImage($deletefilrname){
    if(file_exists($deletefilrname)){
        \Illuminate\Support\Facades\File::delete($deletefilrname);
    }
}
function product_status()
{
    $array = [
        'Dont show in home',
        'show in home'

    ];
    return $array;
}