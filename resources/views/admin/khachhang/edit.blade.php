@extends('layouts.admin')
@section('main')
    <div class="card-body">
        <form action="{{route('khachhang.update',$data->id)}}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label for="TieuDe" class="form-label">Họ và tên</label>
                <input type="text" value="{{$data->hovaten}}" class="form-control" id="hovaten" name="hovaten">
                <a class="text-danger">  {{$errors->first('hovaten')}}</a>
            </div>

            <div class="mb-3">
              <label for="gioitinh">Giới tính <span class="text-danger font-weight-bold">*</span></label>
              <select class="custom-select form-control @error('gioitinh') is-invalid @enderror" id="gioitinh" name="gioitinh" required>
                <option value="">-- Choose --</option>
                @if($data->gioitinh==0)
                <option selected value="0">Nam</option>
                <option value="1">Nữ</option>
                @else
                <option  value="0">Nam</option>
                <option selected value="1">Nữ</option>
                @endif
              </select>
              @error('gioitinh')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror

            </div>

            <div class="mb-3">
              <label for="privilege">Kích hoạt <span class="text-danger font-weight-bold">*</span></label>
              <select class="custom-select form-control @error('privilege') is-invalid @enderror" id="gioitinh" name="status" required>
                <option  selected="selected">-- Choose --</option>
                @if($data->status==0)
                <option selected value="0">Không kích hoạt</option>
                <option value="1">Kích hoạt</option>
                @else
                <option  value="0">Không kích hoạt</option>
                <option selected value="1">Kích hoạt</option>
                @endif
               
              </select>
            </div>


            <div class="mb-3">
							<label for="sdt" class="form-label">SĐT</label>
							<input  value="{{$data->sdt}}" type="text" class="form-control" id="sdt" name="sdt" >
              <a class="text-danger">  {{$errors->first('sdt')}}</a>
						</div>
            <div class="mb-3">
							<label for="cmnd" class="form-label">CMND</label>
							<input  value="{{$data->cmnd}}" type="text" class="form-control" id="cmnd" name="cmnd">
              <a class="text-danger">  {{$errors->first('cmnd')}}</a>
						</div>
            <div class="mb-3">
							<label for="ngaysinh" class="form-label">Ngày sinh</label>
							<input  value="{{$data->ngaysinh}}" type="date" class="form-control" id="ngaysinh" name="ngaysinh" required>
							<div class="invalid-feedback">Ngày sinh không được bỏ trống.</div>
						</div>
            
            <div class="mb-3">
							<label for="diachi" class="form-label">Địa chỉ</label>
							<input  value="{{$data->diachi}}" type="text" class="form-control" id="diachi" name="diachi" required>
							<div class="invalid-feedback">Địa chỉ không được bỏ trống.</div>
						</div>
            <div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input  value="{{$data->email}}" type="email" class="form-control" id="email" name="email">
              <a class="text-danger">  {{$errors->first('email')}}</a>
						</div>
            <div class="mb-3">
							<label for="tendangnhap" class="form-label">Tên đăng nhập</label>
							<input  value="{{$data->tendangnhap}}" type="text" class="form-control" id="tendangnhap" name="tendangnhap">
              <a class="text-danger">  {{$errors->first('tendangnhap')}}</a>
						</div>
            <div class="mb-3">
							<label for="password" class="form-label">Mật khẩu</label>
							<input type="text" class="form-control" id="password" name="password" >
							<div class="invalid-feedback">Mật khẩu không được bỏ trống.</div>
						</div>
            <button type="submit" class="btn btn-primary">Lưu</button>

          </form>
    </div>
</div>

@endsection
