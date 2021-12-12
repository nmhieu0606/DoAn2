@extends('layouts.admin')
@section('main')
<div class="card" >
    <div class="card-body">
        <form action="{{route('tinhtrang.store')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="tinhtrang" class="form-label">Nhập tình trạng</label>
              <input type="text" class="form-control" name="tinhtrang" id="exampleInputEmail1" >
              {{$errors->first('tinhtrang')}}
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</div>
@endsection
