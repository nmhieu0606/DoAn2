<?php

namespace App\Http\Controllers;

use App\Models\nhanvien;
use App\Models\chucvu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class chucvu_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=chucvu::search()->paginate(10);
        return view('admin.chucvu.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route=[];
        $all=Route::getRoutes();
        foreach($all as $r){
            array_push($route,$r->getName());
        }
        
        return view('admin.chucvu.create',compact('route'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $data=new chucvu;
        $data->tenchucvu=$request->tenchucvu;
       
        $data->quyen= json_encode($request->route);
        
        if($data->save()){
            return redirect('admin/chucvu');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\chucvu  $chucvu
     * @return \Illuminate\Http\Response
     */
    public function show(chucvu $chucvu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\chucvu  $chucvu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = chucvu::find($id);
        $route=[];
        $all=Route::getRoutes();
        $quyen=json_decode($data->quyen);
        
        foreach($all as $r){
            array_push($route,$r->getName());
        }
        
        
        
		return view('admin.chucvu.edit', compact('data','route','quyen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chucvu  $chucvu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $data = chucvu::find($id);
        $data->tenchucvu=$request->tenchucvu;
        $data->quyen= json_encode($request->route);
        if($data->save())
            return redirect('admin/chucvu');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chucvu  $chucvu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= chucvu::find($id)->delete();
        if($data)
            return redirect('admin/chucvu');
    }
}
