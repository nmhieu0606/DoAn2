@extends('layouts.site')
@section('main')
    
    <div class="main_content">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading_s1">
                            <h4>Thông tin khách hàng</h4>
                        </div>
                        <form action="{{route('post_dathang')}}" method="post">
                          @csrf
                            <div class="form-group">
                              <label for="hovaten" class="form-label">Họ và tên</label>
                                <input disabled value="{{Auth::guard('khachhang')->user()->hovaten}}" type="text" required class="form-control" >
                            </div>
                            
                           
                            <div class="form-group">
                              <label for="diachi" class="form-label">Địa chỉ</label>
                                <input disabled value="{{Auth::guard('khachhang')->user()->diachi}}" class="form-control" required type="text" >
                            </div>
                            <div class="form-group">
                              <label for="sdt" class="form-label">SĐT</label>
                                <input disabled value="{{Auth::guard('khachhang')->user()->sdt}}" class="form-control" required type="number" >
                            </div>
                            <div class="form-group">
                              <label for="email" class="form-label">Email</label>
                              <input disabled value="{{Auth::guard('khachhang')->user()->email}}" class="form-control" required type="text"  >
                            </div>
                          
                        </form>
                        
                    </div>
                    <div class="col-md-6">
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="gioitinh" class="form-label">Giới tính: </label>
                           @if (Auth::guard('khachhang')->user()->gioitinh==0)
                               Nam
                           
                            @else
                                Nữ
                            
                           @endif
                        </div>
                        <div class="form-group">
                            <label for="diachi" class="form-label">Ngày sinh</label>
                              <input disabled value="{{Auth::guard('khachhang')->user()->ngaysinh}}" class="form-control" required type="date" >
                        </div>
                        <div class="form-group">
                            <label for="diachi" class="form-label">CMND</label>
                              <input disabled value="{{Auth::guard('khachhang')->user()->cmnd}}" class="form-control" required type="text" >
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#thongtin">
                            Đổi thông tin
                        </button>

                    </div>
                    <!-- Button trigger modal -->
                   
                
                <!-- Modal -->
                    <div class="modal fade" id="thongtin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Đổi thông tin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('taikhoan.update')}}" method="POST" enctype="multipart/form-data">
                                    @csrf 
                                        <div class="form-group">
                                            <label for="anh">Ảnh đại diện<span class="text-danger font-weight-bold">*</span></label>
                                            <input id="file_anh" type="file" class="form-control "  name="file_anh" value="{{ old('file_anh') }}"  autocomplete="file_anh" />

                                        </div>
                                   
                                        <div class="mb-3">
                                            <label for="TieuDe" class="form-label">Họ và tên</label>
                                            <input type="text" value="{{$data->hovaten}}" class="form-control" id="hovaten" name="hovaten" required>
                                            {{$errors->first('hovaten')}}
                                        </div>
                        
                                        <div class="mb-3">
                                        <label for="gioitinh">Giới tính <span class="text-danger font-weight-bold">*</span></label>
                                        <select class="custom-select form-control @error('gioitinh') is-invalid @enderror" id="gioitinh" name="gioitinh" required>
                                            <option value="">-- Choose --</option>
                                            <option value="0">Nam</option>
                                            <option value="1" selected="selected">Nữ</option>
                                        </select>
                                        {{$errors->first('gioitinh')}}
                                        </div>
                                        <div class="mb-3">
                                            <label for="sdt" class="form-label">SĐT</label>
                                            <input  value="{{$data->sdt}}" type="text" class="form-control" id="sdt" name="sdt" required >
                                            {{$errors->first('sdt')}}
                                        </div>
                                        <div class="mb-3">
                                            <label for="cmnd" class="form-label">CMND</label>
                                            <input  value="{{$data->cmnd}}" type="text" class="form-control" id="cmnd" name="cmnd" required>
                                            {{$errors->first('cmnd')}}
                                        </div>
                                        <div class="mb-3">
                                            <label for="ngaysinh" class="form-label">Ngày sinh</label>
                                            <input  value="{{$data->ngaysinh}}" type="date" class="form-control" id="ngaysinh" name="ngaysinh" required>
                                            {{$errors->first('ngaysinh')}}
                                        </div>
                            
                                        <div class="mb-3">
                                            <label for="diachi" class="form-label">Địa chỉ</label>
                                            <input  value="{{$data->diachi}}" type="text" class="form-control" id="diachi" name="diachi" required>
                                            {{$errors->first('diachi')}}
                                        </div>
                                        <div class="mb-3">
                                            <label for="diachi" class="form-label">Email</label>
                                            <input  value="{{$data->email}}" type="email" class="form-control" id="diachi" name="email" required>
                                            {{$errors->first('email')}}
                                        </div>
                                        
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                        
                                  </form>
                                
                            </div>
                            
                        </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
@endsection
 