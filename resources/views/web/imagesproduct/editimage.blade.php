@extends('web.imagesproduct.home')

@section('body')

    {!! Form::model($imageInfo,['url'=>'/image/update/'.$imageInfo->id, 'method'=>'patch', 'files'=>'true']) !!}



    <div class="form-group">
        <label for="userfile">Image Product</label>

        <img src="{{ Request::root().'/images/products/'.$imageInfo->image }}" width="100" style="margin-top: 15px;"/>
        {!! Form::file("image",null,['class'=>'form-control df']) !!}
    </div>

    <button  type="submit" class="btn btn-warning dt" style="margin-bottom: 20px;">
        <i class="fa fa-btn fa-user"></i>Done
    </button>
    <div class="clearfix"></div>

    {!! Form::close() !!}
@stop