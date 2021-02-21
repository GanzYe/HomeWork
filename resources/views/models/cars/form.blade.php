<?php
$car = $car ?? null;
?>
@extends('layouts.app')

@section('content')
<h1>Cars {{$car ? 'edit':'create'}}</h1>

<form enctype="multipart/form-data" method="post" action="{{$car ? route('cars.update',$car):route('cars.store',$car)}}">
    @csrf
    @if($car)
        @method('put')
    @endif
    <div>
        <label for="name">Название</label>
        <input value="{{old('name',$car->name??null)}}" type="text" id="name" name="name">
        @error('name')
            <div>{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="model">Модель</label>
        <input value="{{old('model',$car->model??null)}}" type="text" id="model" name="model">
        @error('model')
            <div>{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="color">Цвет</label>
        <input value="{{old('color',$car->color??null)}}" type="color" id="color" name="color">
        @error('color')
            <div>{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="speed">Скорость</label>
        <input value="{{old('speed',$car->speed??null)}}" type="number" id="speed" name="speed">
        @error('speed')
            <div>{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="power">Мощность</label>
        <input value="{{old('power',$car->power??null)}}" type="number" id="power" name="power">
        @error('model')
            <div>{{$message}}</div>
        @enderror
    </div>
    <button>{{$car?'Обновить':'Добавить'}}</button>
</form>
@endsection
