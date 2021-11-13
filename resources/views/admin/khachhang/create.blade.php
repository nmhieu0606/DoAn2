@extends('layouts.admin')
@section('main')
<div class="card" >
 
    <div class="card-body">
        <form action="{{route('khachhang.store')}}" method="POST">
            @csrf
           
            <div class="mb-3">
							<label for="TieuDe" class="form-label">Họ và tên</label>
<<<<<<< HEAD
							<input type="text" class="form-control" id="hovaten" name="hovaten" required>
							
=======
							<input type="text" class="form-control" id="hovaten" name="hovaten" request >
							{{$errors->first('hovaten')}}
>>>>>>> 84da8ff9b09fe6640f00090931ed0d02749ad913
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
							<label for="sdt" class="form-label">SĐT</label>
<<<<<<< HEAD
							<input type="text" class="form-control" id="sdt" name="sdt" required>
=======
							<input type="text" class="form-control" id="sdt" name="sdt">
						
							{{$errors->first('sdt')}}
						
>>>>>>> 84da8ff9b09fe6640f00090931ed0d02749ad913
							
						</div>
            <div class="mb-3">
							<label for="cmnd" class="form-label">CMND</label>
<<<<<<< HEAD
							<input type="text" class="form-control" id="cmnd" name="cmnd" required>
							
=======
							<input type="text" class="form-control" id="cmnd" name="cmnd" >
							{{$errors->first('cmnd')}}
>>>>>>> 84da8ff9b09fe6640f00090931ed0d02749ad913
						</div>
            <div class="mb-3">
							<label for="ngaysinh" class="form-label">Ngày sinh</label>
							<input type="date" class="form-control" id="ngaysinh" name="ngaysinh" required>
<<<<<<< HEAD
							
=======
>>>>>>> 84da8ff9b09fe6640f00090931ed0d02749ad913
						</div>
            
            <div class="mb-3">
							<label for="diachi" class="form-label">Địa chỉ</label>
<<<<<<< HEAD
							<input type="text" class="form-control" id="diachi" name="diachi" required>
							
=======
							<input type="text" class="form-control" id="diachi" name="diachi" required>					
>>>>>>> 84da8ff9b09fe6640f00090931ed0d02749ad913
						</div>
            <div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="text" class="form-control" id="email" name="email" required>
<<<<<<< HEAD
							
=======
							{{$errors->first('email')}}
>>>>>>> 84da8ff9b09fe6640f00090931ed0d02749ad913
						</div>
            <div class="mb-3">
							<label for="tendangnhap" class="form-label">Tên đăng nhập</label>
							<input type="text" class="form-control" id="tendangnhap" name="tendangnhap" required>
<<<<<<< HEAD
							
=======
							{{$errors->first('tendangnhap')}}
>>>>>>> 84da8ff9b09fe6640f00090931ed0d02749ad913
						</div>
            <div class="mb-3">
							<label for="password" class="form-label">Mật khẩu</label>
							<input type="text" class="form-control" id="password" name="password" required>
<<<<<<< HEAD
							
=======
>>>>>>> 84da8ff9b09fe6640f00090931ed0d02749ad913
						</div>
           

            



            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
    </div>
</div>

@endsection
