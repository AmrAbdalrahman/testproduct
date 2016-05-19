@extends('web.imagesproduct.home')

@section('body')

    {!! Form::open(['url'=>'/image/add/'.$pd->id, 'method'=>'post', 'files'=>'true']) !!}


    <div class="form-group">
        <label for="userfile">Image Product</label>

        {!! Form::file("image",null,['class'=>'form-control df']) !!}
    </div>

    <button  type="submit" class="btn btn-warning dt" style="margin-bottom: 20px;">
        <i class="fa fa-btn fa-user"></i>Upload
    </button>
    <div class="clearfix"></div>

    {!! Form::close() !!}
@stop