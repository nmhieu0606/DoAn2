<a class="nav-link cart_trigger" href="{{route('get_dathang')}}" data-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count">{{$giohang->soluong}}</span></a>
<div class="cart_box dropdown-menu dropdown-menu-right">
    <ul class="cart_list">
        @foreach ($giohang->items as $item)
        <li>
            <a href="{{route('giohang.xoa',$item['id'])}}" class="item_remove"><i class="ion-close"></i></a>
            <a href="#"><img src="{{url('public/uploads')}}/{{$item['anh']}}" alt="cart_thumb1">{{$item['tensp']}}</a>
            <span class="cart_quantity"> {{$item['soluong']}} x <span class="cart_amount"> <span class="price_symbole"></span></span>{{number_format($item['gia'])}}</span>
        </li>
        @endforeach
    </ul>
    <div class="cart_footer">
        <p class="cart_total"><strong>Tổng tiền:</strong> <span class="cart_price"> <span class="price_symbole"></span></span>{{number_format($giohang->gia)}}.VNĐ</p>
        <p class="cart_buttons"><a href="{{route('giohang.index')}}" class="btn btn-fill-out checkout">Giỏ hàng</a></p>
    </div>
</div>