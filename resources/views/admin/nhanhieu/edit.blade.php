@extends('layouts.admin')
@section('main')
<div class="card" >
    <div class="card-body">
        <form action="{{route('nhanhieu.update',$data->id)}}" method="POST">
            @csrf  @method('PUT')
            <div class="mb-3">
              <label for="nhanhieu" class="form-label">Nhập tên nhãn hiệu</label>
              <input value="{{$data->nhanhieu}}" type="text" class="form-control" name="nhanhieu" id="nhanhieu" required >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

@endsection
