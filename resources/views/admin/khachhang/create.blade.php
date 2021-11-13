@extends('layouts.admin')
@section('main')
<form action="" method="GET" class="form-inline">
  <div class="form-group ">
    <input class="form-control" name="tukhoa" placeholder="Nhập tên danh mục">
   </div>
  <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
</form>

<a href="#"  class="btn btn-primary mt-1">Thêm</a> 
<div class="card" >
 
    <div class="card-body">
        <form action="{{route('khachhang.store')}}" method="POST">
            @csrf
           
            <div class="mb-3">
							<label for="TieuDe" class="form-label">Họ và tên</label>
							<input type="text" class="form-control" id="hovaten" name="hovaten" required>
							
						</div>
            
            <div class="mb-3">
              <label for="privilege">giới tính <span class="text-danger font-weight-bold">*</span></label>
              <select class="custom-select form-control @error('privilege') is-invalid @enderror" id="gioitinh" name="gioitinh" required>
                <option value="">-- Choose --</option>
                <option value="0">Nam</option>
                <option value="1" selected="selected">Nữ</option>
              </select>
              @error('privilege')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
            <div class="mb-3">
							<label for="sdt" class="form-label">SĐT</label>
							<input type="text" class="form-control" id="sdt" name="sdt" required>
							
						</div>
            <div class="mb-3">
							<label for="cmnd" class="form-label">CMND</label>
							<input type="text" class="form-control" id="cmnd" name="cmnd" required>
							
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
							<input type="text" class="form-control" id="email" name="email" required>
							
						</div>
            <div class="mb-3">
							<label for="tendangnhap" class="form-label">Tên đăng nhập</label>
							<input type="text" class="form-control" id="tendangnhap" name="tendangnhap" required>
							
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
