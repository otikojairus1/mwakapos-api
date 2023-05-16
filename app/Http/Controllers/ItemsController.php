<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = \App\Models\Items::all();
        return response()->json(['success'=>true, 'message'=>"item fetched successfully", "data"=>$items]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = ['name'=> 'required','category_id'=>"required","brand"=>"required","package"=>"required", "pcs"=>"required", "quantity"=>"required",
            "buying_price"=>"required", "selling_price"=>"required"];
        $input     = $request->only('name', "category_id","brand", "package","pcs","quantity","buying_price","selling_price");
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }
        $new = \App\Models\Items::create(['name'=>$request->name, "category_id"=>$request->category_id, "brand"=>$request->brand, "package"=>$request->package,
        "pcs"=>$request->pcs, "quantity"=>$request->quantity, "buying_price"=>$request->buying_price, "selling_price"=>$request->selling_price  ]); 
        return response()->json(['success'=>true, 'message'=>"item created successfully", "data"=>$new]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item =  \App\Models\Items::find($id);
        if(!$item){
         return response()->json(['success'=>false, 'message'=>"item not found"]);
        }

        $item->update($request->all());

        return response()->json(['success'=>true, 'data'=>$item]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item =  \App\Models\Items::find($id);
        if(!$item){
         return response()->json(['success'=>false, 'message'=>"item not found"]);
        }
        $item->delete();
        return response()->json(['success'=>true, "message"=>"item deleted",'data'=>$item ]);


    }
}
