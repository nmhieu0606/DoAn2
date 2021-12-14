@extends('layouts.admin')
@section('main')
<form action="" method="GET" class="form-inline">
  <div class="form-group ">
    <input class="form-control mb-3" name="tukhoa" placeholder="Nhập mã đơn">
   </div>
  <button type="submit" class="btn btn-primary mb-3">Tìm Kiếm</button>
</form>

<div class="card" >
 
    <div class="card-body">
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
          @foreach ($data as $item)
            <tr>
    
              <td  >{{$item->id}}</td>
              <td  >{{$item->khachhang->hovaten}}</td>
              @if(isset($item->nhanvien_id))
                <td>{{$item->nhanvien->hovaten}}</td>
              
              @else
              <td>

                  <a class="btn btn-primary" onclick="return confirm('Bạn có đồng ý nhận đơn hàng {{$item->id}}')" href="{{route('donhang.nhandon',$item->id)}}">Nhận đơn</a>
                
              </td>
              @endif
              <td  >{{$item->ngaydathang}}</td>
              <td  >{{number_format($item->tongtien)}}</td>
              <td  >{{$item->tinhtrang->tinhtrang}}</td>
              <td  ><a class="btn btn-primary" href="{{route('donhang.show',$item->id)}}">Xem</a></td>
              <td  ><a class="btn btn-warning" href="{{route('donhang.show',$item->id)}}?pdf=true">PDF</a></td>
             
              <td>
                <a onclick="return confirm('bạn có muốn xóa nó không đơn hàng {{$item->id}} không?')" href="{{route('donhang.destroy',$item->id)}}" class="btn btn-danger ">Xóa</a>
             </td>
             @if ($item->nhanvien_id!=null|| Auth::user()->chucvu_id==5||Auth::user()->chucvu_id==4)

             @if($item->tinhtrang_id!=5 && Auth::user()->id==$item->nhanvien_id || Auth::user()->chucvu_id==5||Auth::user()->chucvu_id==4)
              <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      Tình trạng
                    </button>
                    <ul class="dropdown-menu">
                      @foreach ($tinhtrang as $tt)
                        <li><a class="dropdown-item" href="{{route('donhang.tinhtrang',['id'=>$item->id,'tt'=>$tt->id])}}">{{$tt->tinhtrang}}</a></li>
                      @endforeach
                    </ul>
                  </div>
              </td>
             @endif
             @endif
            </tr>
          @endforeach
        </tbody>
      </table>
      
      <form method="POST" action="" id="form-delete">
        @csrf @method('DELETE')
      <form>
        <hr>
        <div class="">{{$data->appends(request()->all())->links()}}</div>
    </div>
</div>

@endsection
@section('js')
<script>
  $('.btndelete').click(function(ev){
    ev.preventDefault();
    var _href=$(this).attr('href');
    $('form#form-delete').attr('action',_href);
   if(confirm('bạn có chắc muốn xóa nó không?')){
      $('form#form-delete').submit();
   }
    
  })


</script>

@endsection
