@extends('layouts.admin')
@section('main')

<a href="#"  class="btn btn-primary mt-1">Thêm</a> 
<div class="card" >
 
    <div class="card-body">
        <form action="{{route('nhanvien.store')}}" method="POST">
            @csrf
           
            <div class="mb-3">
				<label for="hovaten">Họ và tên <span class="text-danger font-weight-bold">*</label>
				<input type="text" class="form-control" id="hovaten" name="hovaten" >
				{{$errors->first('hovaten')}}
			</div>
            
            <div class="mb-3">
              <label for="privilege">Giới tính <span class="text-danger font-weight-bold">*</span></label>
              <select class="custom-select form-control @error('privilege') is-invalid @enderror" id="gioitinh" name="gioitinh" >
                <option value="" selected="selected">-- Choose --</option>
                <option value="0">Nam</option>
                <option value="1">Nữ</option>
              </select>
              {{$errors->first('gioitinh')}}
            </div>
           
            <div class="mb-3">
				<label for="ngaysinh" class="form-label">Ngày sinh</label>
				<input type="date" class="form-control" id="ngaysinh" name="ngaysinh" >
				{{$errors->first('ngaysinh')}}
			</div>
            
            <div class="mb-3">
				<label for="diachi">Địa chỉ <span class="text-danger font-weight-bold">*</span></label>
				<input type="text" class="form-control" id="diachi" name="diachi" >
				{{$errors->first('diachi')}}
			</div>
			<div class="mb-3">
				<label for="sdt">SĐT <span class="text-danger font-weight-bold">*</span></label>
				<input type="text" class="form-control" id="sdt" name="sdt" >
				{{$errors->first('sdt')}}
			</div>
            <div class="mb-3">
				<label for="cmnd">CMND <span class="text-danger font-weight-bold">*</span></label>
				<input type="text" class="form-control" id="cmnd" name="cmnd" >
				{{$errors->first('cmnd')}}
			</div>

			<div class="form-group">
                <label for="chucvu_id">Chức vụ <span class="text-danger font-weight-bold">*</span></label>
                <select id="chucvu_id" class="form-control custom-select @error('chucvu_id') is-invalid @enderror" name="chucvu_id"  autofocus>
                    <option value="">-- Chọn chức vụ --</option>
                    @foreach($chucvu as $value)
                        <option value="{{$value->id }}">{{ $value->tenchucvu }}</option>
                    @endforeach
                </select>
                {{$errors->first('chucvu_id')}}
            </div>
            <div class="mb-3">
				<label for="email">Email <span class="text-danger font-weight-bold">*</span></label>
				<input type="text" class="form-control" id="email" name="email" >
				{{$errors->first('email')}}
			</div>
            <div class="mb-3">
				<label for="tendangnhap">Tên đăng nhập <span class="text-danger font-weight-bold">*</span></label>
				<input type="text" class="form-control" id="tendangnhap" name="tendangnhap" >
				{{$errors->first('tendangnhap')}}
			</div>
            <div class="mb-3">
				<label for="password">Mật khẩu <span class="text-danger font-weight-bold">*</span></label>
				<input type="text" class="form-control" id="password" name="password" >
				{{$errors->first('password')}}
			</div>
            
            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
    </div>
</div>

@endsection
