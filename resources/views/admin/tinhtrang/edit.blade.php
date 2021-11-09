@extends('layouts.admin')
@section('main')
<div class="card">
    <div class="card-body">
        <form action="{{route('tinhtrang.update',$data->id)}}" method="POST">
            @csrf  @method('PUT')
            <div class="mb-3">
               
                <input type="hidden" id="id" name="id" value="{{$data->id}}" />
            <div class="mb-3">
               
              <label for="tinhtrang" class="form-label">Nhập tên tình trạng</label>
              <input value="{{$data->tinhtrang}}" type="text" class="form-control" name="tinhtrang" id="tentinhtrang" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

@endsection
