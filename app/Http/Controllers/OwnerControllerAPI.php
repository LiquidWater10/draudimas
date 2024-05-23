<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\owner;
use App\Http\Requests\OwnerRequest;

class OwnerControllerAPI extends Controller
{
    public function owners()
    {
        return owner::all();
    }
    public function owner($id)
    {
        $owner= owner::find( $id);
        if ($owner==null){
            return response()->json(['message'=>'owner not found'],404);
        }
        return $owner;
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
        $owner->user_id = $request->user_id;
        $owner->save();
        return $owner;
    }

    public function update(OwnerRequest $request, $id)
    {
        $owner= owner::find($id);
        if ($owner==null){
            return response()->json(['message'=>'owner not found'],404);
        }
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->phone = $request->phone;
        $owner->email = $request->email;
        $owner->address = $request->address;
        $owner->user_id = $request->user_id;
        $owner->save();
        return $owner;
    }
    public function destroy($id)
    {
        $owner = Owner::find($id);
        if ($owner==null){
            return response()->json(['message'=>'owner not found'],404);
        }
        $owner->delete();
        return $owner;
    }

}
