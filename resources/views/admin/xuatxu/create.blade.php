@extends('layouts.admin')
@section('main')
<div class="card" >
    <div class="card-body">
        <form action="{{route('xuatxu.store')}}" method="POST">
            @csrf
            <div class="mb-3">
              
              <label for="xuatxu">Nhập tên xuất xứ <span class="text-danger font-weight-bold">*</label>
              <input type="text" class="form-control" name="xuatxu" id="xuatxu">
              {{$errors->first('xuatxu')}}
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

@endsection
