<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\owner;
use App\Http\Requests\OwnerRequest;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Car::class,'car');
    }

    public function index(): View
    {
        return view('default');
    }
    public function home()
    {
        if(auth()->user()->can('view-owner')) {

            return view('owners.home',
                [
                    'owners' => owner::with('cars')->get()
                ]);
        }
        else{
            $user_id= auth()->user()->id;
            return view('owners.home',
                [
                    'owners' => owner::with('cars')->where('user_id', $user_id)->get()
                ]);
        }
    }

    public function create(): View
    {
        return view('owners.create');
    }

    public function store(OwnerRequest $request)
    {
        $request->validated();
        $owner= new owner;
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->phone = $request->phone;
        $owner->email = $request->email;
        $owner->address = $request->address;

        $owner->save();
        return redirect()->route('home');
    }
    public function delete($id)
    {
        $owner = Owner::findOrFail($id);
        $this->authorize('delete', $owner);
        owner::destroy($id);
        return redirect()->route('home');
    }

    public function retrieve($id): View
    {
        $owner= owner::findOrFail($id);
        $this->authorize('update', $owner);
        return view('owners.edit',
            [
                'owner'=>owner::find($id)
            ]);
    }

    public function update(OwnerRequest $request, $id)
    {
        $owner= owner::findOrFail($id);
        $this->authorize('update', $owner);
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->phone = $request->phone;
        $owner->email = $request->email;
        $owner->address = $request->address;
        $owner->save();
        return redirect()->route('home');
    }
}
