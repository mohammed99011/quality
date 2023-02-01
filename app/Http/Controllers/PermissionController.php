<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::OrderBy('id' , 'desc')->paginate(10);
        return response()->view('cms.spaity.permission.index' , compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.spaity.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [

        ],[

        ]);

        if (! $validator ->fails()){
            $permissions = new Permission();
            $permissions->name = $request->get('name');
            $permissions->guard_name = $request->get('guard_name');

            $isSaved = $permissions->save();

            return response()->json([
                'icon' => $isSaved ? 'success' : 'error' ,
                'title' => $isSaved ? 'Created is Successfully' : "Created if Fialed",
            ] , $isSaved ? 200 : 400);
        }

        else{
            return response()->json([
                'icon'=> 'error' ,
                'title'=> $validator->getMessageBag()->first(),
            ] , 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = Permission::findOrFail($id);
        return response()->view('cms.spaity.permission.edit' , compact('permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(), [

        ],[

        ]);

        if (! $validator->fails()){
            $permissions = Permission::findOrFail($id);
            $permissions->name = $request->get('name');
            $permissions->guard_name = $request->get('guard_name');

            $isUpdate = $permissions->save();
            return ['redirect' => route('permissions.index')];

            return response()->json([
                'icon' => $isUpdate ? 'success' : 'error' ,
                'title' => $isUpdate ? 'Updated is Successfully' : "Updated if Fialed",
            ] , $isUpdate ? 200 : 400);
        }

        else{
            return response()->json([
                'icon'=> 'error' ,
                'title'=> $validator->getMessageBag()->first(),
            ] , 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permissions = Permission::destroy($id);
    }
}
