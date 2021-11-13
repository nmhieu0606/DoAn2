@extends('layouts.admin')
@section('main')
<div class="card" >
 
    <div class="card-body">
        <form action="{{route('danhmuc.store')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="tendanhmuc" class="form-label">Nhập tên danh mục</label>
              <input type="text"  class="form-control" @error('tendanhmuc') is-invalid @enderror name="tendanhmuc" id="tendanhmuc"  >
              {{$errors->first('tendanhmuc')}}
              
            </div>
            <div class="mb-3">
              
              <select required name="parent_id" class="form-select" aria-label="Default select example">
                <option selected>Chọn danh mục cha</option>
                <option value="0">Parent</option>
                @foreach ($danhmuc as $item)
                <option value="{{$item->id}}">{{$item->tendanhmuc}}</option>
                @endforeach
              </select>
              {{$errors->first('parent_id')}}
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

@endsection
