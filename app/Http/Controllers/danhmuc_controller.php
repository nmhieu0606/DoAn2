<?php

namespace App\Http\Controllers;

use App\Models\danhmuc;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;

class danhmuc_controller extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       $danhmuc=danhmuc::search()->paginate(10);
        return view('admin.danhmuc.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmuc=danhmuc::where('parent_id',0)->get();
        return view('admin.danhmuc.create',compact('danhmuc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages = [
            'tendanhmuc.required' => 'Tên danh mục không được bỏ trống',
        ];

        $request->validate([
            'tendanhmuc'=>'required|max:100|unique:danhmuc',
            'parent_id'=>'required|numeric'
        ],$messages);
        $data=new danhmuc;
        $data->tendanhmuc=$request->tendanhmuc;
        $data->parent_id=$request->parent_id;
        $data->slug=Str::slug($data->tendanhmuc);
        if($data->save()){
            $data=danhmuc::all();
            
            return view('admin.danhmuc.index',compact('data'));
        }
        
       
    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\danhmuc  $danhmuc
     * @return \Illuminate\Http\Response
     */
    public function show(danhmuc $danhmuc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\danhmuc  $danhmuc
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = danhmuc::find($id);
        
		return view('admin.danhmuc.edit', compact('data'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\danhmuc  $danhmuc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = danhmuc::find($id);
        
        $data->tendanhmuc=$request->tendanhmuc;
        $data->slug=Str::slug($data->tendanhmuc);
        $data->parent_id=$request->parent_id;
        $data->save();
        return redirect('admin/danhmuc');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\danhmuc  $danhmuc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      danhmuc::find($id)->delete();
      return redirect('admin/danhmuc');
       
    }
}
