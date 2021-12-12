<?php

namespace App\Http\Controllers;

use App\Models\slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use File;

class slide_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=slide::paginate(10);
        return view('admin.slide.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->has('anh')){
            $file=$request->anh;
            $ex=$request->anh->extension();
            $file_name=time().''.Str::slug($request->ten).''.'.'.$ex;
            $file->move(public_path('slide'),$file_name);
        }
        $slide=[
            'ten'=>$request->ten,
            'anh'=>$file_name,
            'nhanvien_id'=>Auth::user()->id,
            'status'=>$request->status,
        ];
        //$request->merge(['anh'=>$file_name]);
        if(slide::create($slide)){
            return redirect('admin/slide');
        }

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(slide $slide)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=slide::find($id);
        return view('admin.slide.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->has('anh')){
            $file=$request->anh;
            $ex=$request->anh->extension();
            $file_name=time().''.$request->tensp.''.'.'.$ex;
            $file->move(public_path('slide'),$file_name);

            $data=slide::find($id);
            File::delete('public/slide/'.$data->anh);
            //$request->merge(['anh'=>$file_name]);
        }
        $anhcu=slide::find($id);
        $slide=[
            'tensp'=>$request->tensp,
            'anh'=>$request->has('anh')?$file_name:$anhcu->anh,
            'status'=>$request->status,
            'nhanvien_id'=>Auth::user()->id,  
        ];
        if(slide::find($id)->update($slide)){
            return redirect('admin/slide');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=slide::find($id);
        $duongdan = 'public/slide';
        File::delete($duongdan.'/'.$data->anh);
        $data->delete();
        return redirect()->back()->with('yes','Xóa slide thành công');
    }
}
