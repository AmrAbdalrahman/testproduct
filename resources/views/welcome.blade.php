@extends('layouts.app')



    <link rel="stylesheet" href="{{ Request::root()  }}/main/style.css">

@section('content')

    <div class="col-md-6">
        <a href="{{ url('addproduct/') }}" class="btn btn-primary btn-add"> Add Product</a>
    </div>




    <div class="container">
        <div class="row">


            <div class="col-md-12 pp">

                @if(count($productAll)>0)

                    @foreach($productAll as $key => $p)
                        @if($key % 3 == 0 && $key != 0)
                            <div class="clearfix"></div>
                        @endif
@if($p->product_status == 1)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail" >
                        <h4 class="text-center"><span class="label label-info">{{ $p->product_name }}</span></h4>
                        <img src="{{ checkIfImagesIsExit($p->product_images,'/public/images/thum/','/images/thum/') }}" class="img-responsive">
                        <div class="caption">
                            <p>{{ str_limit($p->product_des,50)  }}</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="{{ url('/SingleProduct/'.$p->id.'/'.$p->product_name) }}" class="btn btn-primary btn-product"> View</a>
                                </div>
                                <div class="col-md-4">

                                    <a href="{{ url('/edit/'.$p->id.'/'.$p->product_name) }}" class="btn btn-success btn-product"> Edit</a></div>
                                <div class="col-md-4">
                                    <a href="{{ url('/delete/'.$p->id.'/'.$p->product_name) }}" class="btn btn-primary btn-product"> Delete</a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                            @endif

                    @endforeach


            </div>



        </div>

        <div class="text-center">

            {{ $productAll->appends(Request::except('page'))->render() }}

        </div>


    </div>


    @endif
@endsection
