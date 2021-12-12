@extends('layouts.admin')
@section('main')
<div class="card">
    <div class="card-body">
        <form action="{{route('baohanh.update',$data->id)}}" method="POST">
            @csrf  @method('PUT')
            <div class="mb-3">
                <input type="hidden" id="id" name="id" value="{{$data->id}}" />
            <div class="mb-3">  
              <label for="thoigianbaohanh" class="form-label">Nhập thời gian bảo hành</label>
              <input value="{{$data->thoigianbaohanh}}" type="text" class="form-control" name="thoigianbaohanh" id="thoigianbaohanh" >
              {{$errors->first('thoigianbaohanh')}}
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

@endsection
