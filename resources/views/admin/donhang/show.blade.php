@extends('layouts.admin')
@section('main')

<div class="card" >
 
    <div class="card-body">
        
        <table>
            <tr>
                <td><h4>Họ và tên: {{$kh->hovaten}}</h4></td>
            </tr>
            <tr>
                <td><h4>Địa chỉ: {{$kh->diachi}} </h4></td> 
            </tr>
            <tr>
                <td><h4>SĐT: {{$kh->sdt}}</h4></td>
            </tr>

        </table>
        <table class="table">
            <thead>
                
                <tr>
                    <th class="product-thumbnail"></th>
                    <th class="product-thumbnail">Sản phẩm</th>
                    <th class="product-name">Đơn giá</th>
                    <th class="product-price">Số lượng</th>
                    <th class="product-quantity">Thành tiền</th> 
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                   
                    <td  ><img width="50px" src="{{url('public/uploads')}}/{{$item->sanpham->anh}}"></td>
                    <td  >{{$item->sanpham->tensp}}</td>
                    <td  >{{number_format($item->sanpham->giaxuat)}}.VND</td>
                    <td  >{{$item->soluong}}</td>
                    <td  >{{number_format($item->soluong*$item->sanpham->giaxuat)}}</td>
                </tr>
               
               
                @endforeach
                @if(Auth::user()->id==$nv_id && $dh->tinhtrang_id!=6&&$dh->tinhtrang_id!=5)
                @foreach ($tinhtrang as $tt)
                <form action="{{route('donhang.tinhtrang',$item->dathang_id)}}" method="POST">
                    @csrf
                   
                        <tr>
                            <td >
                                <input name="tinhtrang_id" type="hidden" value="{{$tt->id}}">
                                <button type="submit" class="btn btn-info">{{$tt->tinhtrang}}</button>
                            </td>
                        </tr>
                    
                </form>
                @endforeach
            @endif
            </tbody>
        </table>
     
    </div>
</div>

@endsection
