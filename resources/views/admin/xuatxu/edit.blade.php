@extends('layouts.admin')
@section('main')
<div class="card" >
    <div class="card-body">
        <form action="{{route('xuatxu.update',$data->id)}}" method="POST">
            @csrf  @method('PUT')
            <div class="mb-3">
              <label for="xuatxu" class="form-label">Nhập tên nhãn hiệu</label>
              <input value="{{$data->xuatxu}}" type="text" class="form-control" name="xuatxu" id="xuatxu" required >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

@endsection
