@extends('layouts.app')


@section('content')


    <style>

        .pv{
            margin-bottom: 25px;
        }
        .po > p{
            font-size: 30px;
        }

    </style>

        <div class="text-center po" >
            <h1 class="text-center pv"><span class="label label-info">{{ $ProductInfo->product_name }}</span></h1>

            <img style="margin: auto;" src="{{ checkIfImagesIsExit($ProductInfo->product_images,'/public/images/thum/','/images/thum/') }}" class="img-responsive pv">

            <div class="col-md-12 text-center" >
                <a href="{{ url('/image/add/'.$ProductInfo->id.'/') }}" class="btn btn-primary" role="button" style="margin-top: 15px;">
                    Add New Image
                </a>
                <h1>{{ $ProductInfo->product_name  }} Images</h1>
                <div class="row">
                @foreach($images as $image)

                    <div class="col-md-3">
                    <img  src="{{ checkIfImagesIsExit($image->image,'/public/images/thum/','/images/thum/') }}" class="img-responsive pv">

                        <a href="{{ url('/image/edit/'.$image->id.'/') }}" class="btn btn-warning" role="button">
                        Edit Image
                    </a>
                    <a href="{{ url('/image/delete/'.$image->id.'/') }}" class="btn btn-danger" role="button">
                        Delete Image
                    </a>
                    </div>

                @endforeach
                </div>
                <hr />

            </div>

            <div class="caption">
                <h1> Product Description</h1>
                <p class="lead pv">{{ $ProductInfo->product_des  }}</p>

            </div>
        </div>



    @endsection