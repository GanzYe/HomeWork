<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Car::class,'car',[
            'except'=>['index','show']
        ]);
    }

    public function index()
    {
        $cars = Car::query()->get();
        return view('models.cars.index',compact('cars'));
    }

    public function create()
    {
        return view('models.cars.form');
    }

    public function store(CarRequest $request)
    {
        $car =auth()->user()->cars()->create($request->validated());
        return redirect()->route('cars.show',$car);
    }

    public function show(Car $car)
    {
        return view('models.cars.show',[
            'car'=>$car,
        ]);
    }

    public function edit(Car $car)
    {
        return view('models.cars.form',[
            'car'=>$car,
        ]);
    }

    public function update(CarRequest $request,Car $car)
    {
        $car->update($request->validated());
        return redirect()->route('cars.show',$car);
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }
}
