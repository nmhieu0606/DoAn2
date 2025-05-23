@extends('layouts.admin')
@section('main')
<div class="card" >
 
    <div class="card-body">
        <form action="{{route('khachhang.store')}}" method="POST">
            @csrf
           
            <div class="mb-3">
				<label for="TieuDe" class="form-label">Họ và tên</label>
				<input type="text" class="form-control" id="hovaten" name="hovaten">
        <a class="text-danger">  {{$errors->first('hovaten')}}</a>
       
			</div>
            
            <div class="mb-3">
              <label for="privilege">giới tính <span class="text-danger font-weight-bold">*</span></label>
              <select class="custom-select form-control @error('privilege') is-invalid @enderror" id="gioitinh" name="gioitinh" required>
                <option value="">-- Choose --</option>
                <option value="0">Nam</option>
                <option value="1" selected="selected">Nữ</option>
              </select>
            </div>
			<div class="mb-3">
              <label for="privilege">Kích hoạt <span class="text-danger font-weight-bold">*</span></label>
              <select class="custom-select form-control @error('privilege') is-invalid @enderror" id="gioitinh" name="status" required>
                <option  selected="selected">-- Choose --</option>
                <option value="0">Không kích hoạt</option>
                <option value="1">Kích hoạt</option>
              </select>
            </div>

            <div class="mb-3">
							<label for="sdt" class="form-label">SĐT</label>
							<input type="text" class="form-control" id="sdt" name="sdt">
              {{$errors->first('sdt')}}
						</div>
            <div class="mb-3">
							<label for="cmnd" class="form-label">CMND</label>
							<input type="text" class="form-control" id="cmnd" name="cmnd">
              {{$errors->first('cmnd')}}
						</div>
            <div class="mb-3">
							<label for="ngaysinh" class="form-label">Ngày sinh</label>
							<input type="date" class="form-control" id="ngaysinh" name="ngaysinh" required>
							
						</div>
            
            <div class="mb-3">
							<label for="diachi" class="form-label">Địa chỉ</label>
							<input type="text" class="form-control" id="diachi" name="diachi" required>
							
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
							<input type="text" class="form-control" id="password" name="password" required>
						</div>
           

            



            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
    </div>
</div>

@endsection
