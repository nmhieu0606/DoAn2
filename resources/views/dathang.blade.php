@extends('layouts.site')
@section('main')
    
    <div class="main_content">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading_s1">
                            <h4>Chi tiết hóa đơn</h4>
                        </div>
                        <form action="{{route('post_dathang')}}" method="post">
                          @csrf
                            <div class="form-group">
                              <label for="hovaten" class="form-label">Họ và tên</label>
                                <input value="{{Auth::guard('khachhang')->user()->hovaten}}" type="text" required class="form-control" name="hovaten" >
                            </div>
                           
                            <div class="form-group">
                              <label for="diachi" class="form-label">Địa chỉ</label>
                                <input value="{{Auth::guard('khachhang')->user()->diachi}}" class="form-control" required type="text" name="diachi">
                            </div>
                            <div class="form-group">
                              <label for="sdt" class="form-label">SĐT</label>
                                <input value="{{Auth::guard('khachhang')->user()->sdt}}" class="form-control" required type="number" name="sdt" >
                            </div>
                            <div class="form-group">
                              <label for="email" class="form-label">Email</label>
                              <input value="{{Auth::guard('khachhang')->user()->email}}" class="form-control" required type="text" name="email" >
                            </div>
                            <button type="submit" class="btn btn-fill-out btn-block">Xác nhận thanh toán</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="heading_s1">
                                <h4>Đơn hàng của bạn</h4>
                            </div>
                            <div class="table-responsive order_table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($giohang->items as $stt=> $item)
                                          
                                     
                                        <tr>
                                            <td>{{$stt++}}</td>
                                            <td>{{$item['tensp']}}</td>
                                            <td>{{number_format($item['gia'])}}</td>
                                            <td>{{$item['soluong']}}</td>
                                            <td>{{number_format($item['gia']*$item['soluong'])}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                   
                                </table>
                            </div>
                            <div class="payment_method">
                                <div class="heading_s1 mr-0">
                                    <h4>Tổng tiền :   {{number_format($giohang->gia)}}</h4>
                                </div>
                               
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
 