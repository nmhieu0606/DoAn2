@extends('layouts.admin')
@section('main')
<div class="card" >
    <div class="card-body">
        <form action="{{route('baohanh.store')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="thoigianbaohanh" class="form-label">Nhập tên thời gian bảo hành</label>
              <input   type="text" class="form-control" name="thoigianbaohanh" id="exampleInputEmail1" required >
              {{$errors->first('thoigianbaohanh')}}

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
    </div>
</div>

@endsection
