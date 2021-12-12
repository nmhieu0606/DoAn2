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

            <div class="mb-3">
              <select required name="parent_id" class="form-select" aria-label="Default select example">
                <option selected>Chọn danh mục cha</option>
                <option value="0">Parent</option>
                @foreach ($danhmuc as $item)
                <option value="{{$item->id}}" {{$data->parent_id==$item->id?'selected':''}}>{{$item->tendanhmuc}}</option>
                @endforeach
              </select>
              {{$errors->first('parent_id')}}
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

@endsection
