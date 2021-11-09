@extends('layouts.admin')
@section('main')
<div class="card">
    <div class="card-body">
        <form action="{{route('danhmuc.update',$data->id)}}" method="POST">
            @csrf  @method('PUT')
            <div class="mb-3">
               
                <input type="hidden" id="id" name="id" value="{{$data->id}}" />
            <div class="mb-3">
               
              <label for="tendanhmuc" class="form-label">nhập tên danh mục</label>
              <input value="{{$data->tendanhmuc}}" type="text" class="form-control" name="tendanhmuc" id="tendanhmuc" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

@endsection
