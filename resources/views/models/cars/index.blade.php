@extends('layouts.app')

@section('content')
    <h1>Машины</h1>
        <a href="{{route('cars.create')}}">
            Добавить машину
        </a>
    </h1>
    @if($cars->isEmpty())
        <p>Carы нет!</p>
    @else
        <ol>
            @foreach($cars as $car)
                <li value="{{$car->id}}">
                    <a href="{{route('cars.show',$car)}}">
                        {{$car->name}}
                    </a>
                </li>
            @endforeach
        </ol>
    @endif
@endsection
