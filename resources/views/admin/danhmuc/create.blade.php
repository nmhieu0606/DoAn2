@extends('layouts.admin')
@section('main')
<form action="" method="GET" class="form-inline">
  <div class="form-group ">
    <input class="form-control" name="tukhoa" placeholder="Nhập tên danh mục">
   </div>
  <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
</form>

<a href="#"  class="btn btn-primary mt-1">Thêm</a> 
<div class="card" >
 
    <div class="card-body">
        <form action="{{route('danhmuc.store')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="tendanhmuc" class="form-label">nhập tên danh mục</label>
              <input type="text"  class="form-control" @error('tendanhmuc') is-invalid @enderror name="tendanhmuc" id="tendanhmuc" >
              @error('tendanhmuc')
              <div class="invalid-feedback">Họ và tên không được bỏ trống.</div>
					    @enderror
            </div>
            <div class="mb-3">
              
              <select name="parent_id" class="form-select" aria-label="Default select example">
                <option selected>Chọn danh mục cha</option>
                <option value="0">Parent</option>
                @foreach ($danhmuc as $item)
                <option value="{{$item->id}}">{{$item->tendanhmuc}}</option>
                @endforeach
                
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

@endsection
