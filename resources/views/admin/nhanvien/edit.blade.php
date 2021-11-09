@extends('layouts.admin')
@section('main')
    <div class="card-body">
        <form action="{{route('nhanvien.update',$data->id)}}" method="POST">
            @csrf @method('PUT')
           
            <div class="mb-3">
              <label for="TieuDe" class="form-label">Họ và tên</label>
              <input type="text" value="{{$data->hovaten}}" class="form-control" id="hovaten" name="hovaten" required>
              <div class="invalid-feedback">Họ và tên không được bỏ trống.</div>
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
              <label for="ngaysinh" class="form-label">Ngày sinh</label>
              <input type="date" value="{{$data->ngaysinh}}" class="form-control" id="ngaysinh" name="ngaysinh" required>
              <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
            </div>
                  
                  <div class="mb-3">
              <label for="diachi" class="form-label">Địa chỉ</label>
              <input type="text" value="{{$data->diachi}}" class="form-control" id="diachi" name="diachi" required>
              <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
            </div>
            <div class="mb-3">
              <label for="sdt" class="form-label">SĐT</label>
              <input type="text" value="{{$data->sdt}}" class="form-control" id="sdt" name="sdt" required>
              <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
            </div>
                  <div class="mb-3">
              <label for="cmnd" class="form-label">CMND</label>
              <input type="text"value="{{$data->cmnd}}" class="form-control" id="cmnd" name="cmnd" required>
              <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
            </div>
      
            <div class="form-group">
              <label for="chucvu_id"><span class="text-danger font-weight-bold">*</span></label>
              <select id="chucvu_id" class="form-control custom-select @error('chucvu_id') is-invalid @enderror" name="chucvu_id" required autofocus>
                  <option value="">--Chọn danh mục sản phẩm--</option>
                  @foreach($chucvu as $value)
                  <option value="{{ $value->id }}" {{($data->chucvu_id== $value->id)?'selected':'' }}>{{$value->tenchucvu}}</option>
                  @endforeach
              </select>
              @error('baohanh_id')
                  <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
          </div>
                  <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" value="{{$data->email}}" class="form-control" id="email" name="email" required>
              <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
            </div>
                  <div class="mb-3">
              <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
              <input type="text" value="{{$data->tendangnhap}}" class="form-control" id="tendangnhap" name="tendangnhap" required>
              <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
            </div>
                  <div class="mb-3">
              <label for="password" class="form-label">Mật khẩu</label>
              <input type="text" class="form-control" id="password" name="password" required>
              <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
            </div>
                  

            <button type="submit" class="btn btn-primary">Lưu</button>

          </form>
    </div>
</div>

@endsection
