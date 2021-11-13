@extends('layouts.admin')
@section('main')

<a href="#"  class="btn btn-primary mt-1">Thêm</a> 
<div class="card" >
 
    <div class="card-body">
        <form action="{{route('nhanvien.store')}}" method="POST">
            @csrf
           
            <div class="mb-3">
				<label for="TieuDe" class="form-label">Họ và tên</label>
				<input type="text" class="form-control" id="hovaten" name="hovaten" >
				{{$errors->first('hovaten')}}
			</div>
            
            <div class="mb-3">
              <label for="privilege">giới tính <span class="text-danger font-weight-bold">*</span></label>
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
				<label for="diachi" class="form-label">Địa chỉ</label>
				<input type="text" class="form-control" id="diachi" name="diachi" >
				{{$errors->first('diachi')}}
			</div>
			<div class="mb-3">
				<label for="sdt" class="form-label">SĐT</label>
				<input type="text" class="form-control" id="sdt" name="sdt" >
				{{$errors->first('sdt')}}
			</div>
            <div class="mb-3">
				<label for="cmnd" class="form-label">CMND</label>
				<input type="text" class="form-control" id="cmnd" name="cmnd" >
				{{$errors->first('cmnd')}}
			</div>

			<div class="form-group">
                <label for="chucvu_id"><span class="text-danger font-weight-bold">*</span></label>
                <select id="chucvu_id" class="form-control custom-select @error('chucvu_id') is-invalid @enderror" name="chucvu_id"  autofocus>
                    <option value="">-- Chọn chức vụ --</option>
                    @foreach($chucvu as $value)
                        <option value="{{$value->id }}">{{ $value->tenchucvu }}</option>
                    @endforeach
                </select>
                {{$errors->first('chucvu_id')}}
            </div>
            <div class="mb-3">
				<label for="email" class="form-label">Email</label>
				<input type="text" class="form-control" id="email" name="email" >
				{{$errors->first('email')}}
			</div>
            <div class="mb-3">
				<label for="tendangnhap" class="form-label">Tên đăng nhập</label>
				<input type="text" class="form-control" id="tendangnhap" name="tendangnhap" >
				{{$errors->first('tendangnhap')}}
			</div>
            <div class="mb-3">
				<label for="password" class="form-label">Mật khẩu</label>
				<input type="text" class="form-control" id="password" name="password" >
				{{$errors->first('password')}}
			</div>
            
            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
    </div>
</div>

@endsection
