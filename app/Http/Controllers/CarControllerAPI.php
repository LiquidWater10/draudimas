<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\CarRequest;

class CarControllerAPI extends Controller
{
    public function cars(){
        return Car::all();
    }

    public function car($id){
        $car= Car::find($id);
        if ($car==null){
            return response()->json(['message'=>'car not found'],404);
        }
        return $car;
    }

    public function store(CarRequest $request)
    {
        $car=car::create($request->all());
        $car->save();
        return $car;
    }

    public function update(CarRequest $request)
    {
        $car= Car::find($request->id);
        if ($car==null){
            return response()->json(['message'=>'car not found'],404);
        }
        $car->reg_number = $request->reg_number;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->owner_id = $request->owner_id;
        $car->save();
        return $car;
    }

    public function destroy($id)
    {
        $car = Car::find($id);
        if ($car==null){
            return response()->json(['message'=>'car not found'],404);
        }
        $car->delete();
        return $car;

    }
}
