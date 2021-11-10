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
        <form action="{{route('baohanh.store')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="thoigianbaohanh" class="form-label">Nhập tên thời gian bảo hành</label>
              <input @error('thoigianbaohanh') is-invalid @enderror type="text" class="form-control" name="thoigianbaohanh" id="exampleInputEmail1" >
              @error('thoigianbaohanh')
              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
              @enderror

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
    </div>
</div>

@endsection
