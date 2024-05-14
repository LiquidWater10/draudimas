<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Image;
use App\Models\owner;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\CarRequest;

class CarController extends Controller
{
    //a constructor, which puts the auth middleware to each route, that it controls.
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Car::class,'car');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = auth()->user();

        if (auth()->user()->can('view-owner')) {
            $cars = Car::all();
        } else {
            $cars = Car::whereHas('owner', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();
        }

        return view('cars.home', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('cars.create',
        [
            'owners'=>owner::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $request->validated();
        $car=car::create($request->all());
        $image= image::create();
        if ($request->file('document')!==null){
            $file=$request->file('document');
            $file->store('/public/documents');
            $image->car_id=$car->id;
            $image->file=$file->hashName();
            $image->name=$file->getClientOriginalName();
        }
        $car->save();
        $image->save();
        return redirect()->route('cars.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car): View
    {
        return view('cars.edit',
            [
                'cars'=>$car,
                'owners'=>owner::all(),
                'images'=>Image::where('car_id', $car->id)->get()
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, Car $car)
    {
        $car->update($request->all());
        $car->save();
        return redirect()->route('cars.index');
    }

    public function add_image(request $request,$id)
    {
        $image= image::create();
        if ($request->file('document')!==null){
            $file=$request->file('document');
            $file->store('/public/documents');
            $image->car_id=$id;
            $image->file=$file->hashName();
            $image->name=$file->getClientOriginalName();
            $image->save();
        }
        return back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');

    }
    public function documentDelete($id){
        $image=image::where('car_id', $id)->get();
        foreach ($image as $image_)
        {
        unlink(storage_path()."/app/public/documents/".$image_->file);
        $image_->delete();
        }
        return back();
    }
}
