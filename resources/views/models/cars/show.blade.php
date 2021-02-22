
@extends('layouts.app')

@section('content')
<h1>Cars show</h1>
    @can('update',$car)
        <div>
            <a href="{{route('cars.edit',$car)}}">Редактировать</a>
        </div>
    @endcan

<div>
    Название: <b>{{$car->name}}</b>
</div>
<div>
    Модель: <b>{{$car->model}}</b>
</div>
<div>
    Цвет: <b>{{$car->color}}</b>
</div>
<div>
    Скорость: <b>{{$car->speed}}</b>
</div>
<div>
    Мощност: <b>{{$car->power}}</b>
</div>
@can('delete',$car)
<form action="{{route('cars.destroy',$car)}}" method="post">
    @csrf @method('delete')
    <button>Удалить</button>
</form>
@endcan
@endsection
