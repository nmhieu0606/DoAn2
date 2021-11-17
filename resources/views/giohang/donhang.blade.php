<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive shop_cart_table">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name">Tên sản phẩm</th>
                            <th class="product-price">Giá</th>
                            <th class="product-quantity">Số lượng</th>
                            <th class="product-subtotal">Thành tiền</th>
                            <th class="product-remove">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($giohang->items as $stt=> $item)
                        <tr>
                       
                            <td class="product-thumbnail"><a href="#"><img src="{{url('public/uploads')}}/{{$item['anh']}}" alt="product1"></a></td>
                            <td class="product-name" data-title="Product"><a href="#">{{$item['tensp']}}</a></td>
                            <td class="product-price" data-title="Price">{{number_format($item['gia'])}}</td>
                            <td class="product-quantity" data-title="Quantity">
                                <div class="quantity">
                                    <a href="{{route('giohang.capnhat_giam',$item['id'])}}" type="button" class="btn btn-info btn-giam">-</a>
                                    <input type="text" value="{{$item['soluong']}}" name="soluong"  class="qty">
                                    <a href="{{route('giohang.capnhat_tang',$item['id'])}}" type="button" class="btn btn-info btn-tang">+</a>
                                
                                </div>
                            </td>
                            <td class="product-subtotal" data-title="Total">{{number_format($item['gia']*$item['soluong'])}}</td>
                            <td class="product-remove" data-title="Remove"><a href="{{route('giohang.xoa',$item['id'])}}"><i class="ti-close"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="medium_divider"></div>
            <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
            <div class="medium_divider"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form class="field_form shipping_calculator">
                <div class="form-row">
                    <div class="form-group col-lg-12">
                        <a href="{{route('giohang.xoatatca')}}" class="btn btn-fill-line" type="submit">Xóa tất cả</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="border p-3 p-md-4">
        
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="cart_total_label">Tổng tiền</td>
                                <td class="cart_total_amount">{{number_format($giohang->gia)}}</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <a href="{{route('get_dathang')}}" class="btn btn-fill-out">Thanh toán</a>
            </div>
        </div>
    </div>
</div>