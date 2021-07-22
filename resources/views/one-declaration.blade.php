@extends('layouts.standard')

@section('title-block')
    Один продукт
@endsection

@section('content')
<h1>Одно объявление</h1>
    <div class="alert alert-info">
        <h3>{{ $data->name}}</h3>
        <figure class="awards__image">
            <img src="{{$data->img_path}}" width="100%">
        </figure>
        <p>{{  $data->description}}</p>
        <p><strong>{{ $data->price}} тг</strong></p>
        <p><small>{{ $data->created_at}}</small></p>
        <a href="{{ route('declarationUpdate', $data->id) }}"><button class="btn btn-primary">Edit</button></a>
        <a href="{{ route('declarationDelete', $data->id) }}"><button class="btn btn-danger">Delete</button></a>
    </div>
@endsection
