<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = \App\Models\Category::all();
        return response()->json(['success'=>true, 'message'=>"Categories fetched successfully", "data"=>$all]);


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
        $rules = ['name'=> 'required'];
        $input     = $request->only('name');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }
        $new = \App\Models\Category::create(['category_name'=>$request->name]); 
        return response()->json(['success'=>true, 'message'=>"Category created successfully", "data"=>$new]);
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
        $update_item = \App\Models\Category::find($id);
        if(!$update_item){
            return response()->json(['success'=>false, "message"=>"no category found with that id"]);

        }
        $new = $update_item->update($request->all()); 
        if(!$new){
            return response()->json(['success'=>false, "message"=>"operation not successfully perfomed"]);
        }
        return response()->json(['success'=>true, 'message'=>"Category updated successfully", "date"=>$update_item]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = \App\Models\Category::find($id);

        if(!$item){
            return response()->json(['success'=>false, "message"=>"no category found with that id"]);

        }
        $item->delete();
        
        return response()->json(['success'=>true, 'message'=>"Category deleted successfully", "date"=>$item]);


    }
}
