@extends('layouts.standard')

@section('title-block')
Все объявления
@endsection

@section('content')
<h1>Список объявлений</h1>
<form action="{{route('search')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-inline">
        <div class="form-group ">
            <input type="text" placeholder="search..." name="search"/><br><br>
        </div>
        <div class="form-group ">
            <button type="submit" class="btn btn-success">Поиск</button>
        </div>
    </div>
</form>
@foreach($data as $element)
    <div class="alert alert-info">
        <h3>{{ $element->name}}</h3>
        <p><strong>{{ $element->price}} тг</strong></p>
        <p><small>{{ $element->created_at }}</small></p>
        <a href="{{ route('declarationDetail', $element->id) }}"><button class="btn btn-warning">Детально</button></a>
    </div>
@endforeach

    <span>
        {{$data->links()}}
    </span>
@endsection

<style>

</style>
