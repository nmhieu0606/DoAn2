@extends('layouts.admin')
@section('main')
<div class="card" >
    <div class="card-body">
        <form action="{{route('slide.update',$data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
              <label for="ten" class="form-label">Nhập tên </label>
              <input   type="text" class="form-control" value="{{$data->ten}}" name="ten" id="exampleInputEmail1" required >
              {{$errors->first('ten')}}
            </div>
            <div class="mb-3">
              <label for="ten" class="form-label">Chọn ảnh</label>
              <input  type="file" class="form-control" name="anh" id="anh" >
              {{$errors->first('ten')}}
            </div>

            <div class="mb-3">
              <select name="status" class="form-select" aria-label="Default select example">
                <option selected>Chọn status</option>
                <option {{$data->status?'selected':''}} value="0">Ản</option>
                <option {{$data->status?'selected':''}} value="1">Hiển thị</option> 
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
    </div>
</div>

@endsection
