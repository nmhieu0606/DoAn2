@extends('layouts.site');
@section('main')
    </div>
        <div class="main_content">
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive shop_cart_table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Mã đơn hàng</th>
                                            <th class="product-name">Khách hàng</th>
                                            <th class="product-price">Nhân viên</th>
                                            <th class="product-quantity">Ngày đặt hàng</th>
                                            <th class="product-subtotal">Tổng tiền</th>
                                            <th class="product-remove">Tình trạng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($data->count('id')==0)
                                            <div class="alert alert-primary" role="alert">
                                                Đơn hàng trống
                                            </div>
                                        @endif
                                        @foreach ($data as $item)

                                        <tr>
                                            <td  >{{$item->id}}</td>
                                            <td  >{{$item->khachhang->hovaten}}</td>
                                            <td  ></td>
                                            <td  >{{$item->ngaydathang}}</td>
                                            <td  >{{number_format($item->tongtien)}}</td>
                                           
                                            <td  >{{$item->tinhtrang->tinhtrang}}</td>
                                           
                                            <td  ><a class="btn btn-primary" href="{{route('get.chitiet_donhang',$item->id)}}">Xem</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                
                                </table>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div> 
@endsection