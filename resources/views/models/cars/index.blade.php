@extends('layouts.app')

@section('content')
    <h1>Машины</h1></h1>
    @can('create',App\Models\Car::class)
            <a href="{{route('cars.create')}}">
                Добавить машину
            </a>
    @endcan
    @if($cars->isEmpty())
        <p>Cars нет!</p>
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
