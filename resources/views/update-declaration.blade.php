@extends('layouts.standard')

@section('title-block')
Update message
@endsection

@section('content')
    <h1>Обновите объявление</h1>

<form action="{{ route('declaration-update-submit', $data->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Название</label>
        <input type="text" id="name" name="name" value="{{ $data->name }}" class="form-control" >
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea name="description" id="description"  class="form-control"  style="height: 200px;">{{ $data->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="price">Цена</label>
        <input type="number" id="price" name="price" value="{{ $data->price }}" class="form-control" >
    </div>
    <div class="form-group">
        <label for="img">Рисунок</label>
        <input type="file" class="form-control" id="img" name="img" accept="image/*" ><br><br>
    </div>
    <button type="submit" class="btn btn-success">Обновить</button>
</form>
@endsection
