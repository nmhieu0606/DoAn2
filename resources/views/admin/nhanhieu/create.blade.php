@extends('layouts.admin')
@section('main')
<div class="card" >
    <div class="card-body">
        <form action="{{route('nhanhieu.store')}}" method="POST">
            @csrf
            <div class="mb-3">
              
              <label for="nhanhieu">Nhập tên nhãn hiệu <span class="text-danger font-weight-bold">*</label>
              <input type="text" class="form-control" name="nhanhieu" id="nhanhieu"  >
              {{$errors->first('nhanhieu')}}
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

@endsection
