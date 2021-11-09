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
        <form action="{{route('tinhtrang.store')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="tinhtrang" class="form-label">Nhập tình trạng</label>
              <input type="text" class="form-control" name="tinhtrang" id="exampleInputEmail1" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

@endsection
