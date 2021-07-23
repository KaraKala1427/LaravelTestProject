@extends('layouts.standard')

@section('title-block')
Доска для объявление
@endsection

@section('content')
    <h1>Добавление объявление</h1>

<form action="{{ route('postDeclare') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Название</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Название">
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea name="description" id="description" class="form-control" placeholder="Описание"></textarea>
    </div>
    <div class="form-group">
        <label for="price">Цена</label>
        <input type="number" id="price" name="price" class="form-control" placeholder="Цена">
        @error('price')
        <small id="emailHelp" class="form-text text-danger">Укажите цену</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="img">Рисунок</label>
        <input type="file" class="form-control" id="img" name="img" accept="image/*" ><br><br>
        @error('img')
        <small id="emailHelp" class="form-text text-danger">Загрузите рисунок</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Добавить запись</button>
</form>
@endsection

@section('requirements')
    <div class="col-4">
        @include('inc.aside')
    </div>
@endsection
