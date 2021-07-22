@extends('layouts.standard')

@section('title-block')
All messages
@endsection

@section('content')
<h1>Список объявлений</h1>
@foreach($data as $element)
    <div class="alert alert-info">
        <h3>{{ $element->name}}</h3>
        <p><strong>{{ $element->price}} тг</strong></p>
        <p><small>{{ $element->created_at }}</small></p>
        <a href="{{ route('declarationDetail', $element->id) }}"><button class="btn btn-warning">Детально</button></a>
    </div>
@endforeach
@endsection
