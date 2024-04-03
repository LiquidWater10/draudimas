<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\owner;
use App\Http\Requests\OwnerRequest;

class OwnerController extends Controller
{
    public function index(): View
    {
        return view('default');
    }
    public function home(): View
    {
        return view('owners.home',
            [
                'owners'=>owner::with('cars')->get()
            ]);
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
        owner::destroy($id);
        return redirect()->route('home');
    }

    public function retrieve($id): View
    {
        return view('owners.edit',
            [
                'owner'=>owner::find($id)
            ]);
    }

    public function update(OwnerRequest $request, $id)
    {
        $owner= owner::find($id);
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->phone = $request->phone;
        $owner->email = $request->email;
        $owner->address = $request->address;
        $owner->save();
        return redirect()->route('home');
    }
}
