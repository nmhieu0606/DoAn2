@extends('layouts.admin')
@section('main')
<form action="" method="GET" class="form-inline">
  <div class="form-group ">
    <input class="form-control mb-3" name="tukhoa" placeholder="Nhập tên khách hàng">
   </div>
  <button type="submit" class="btn btn-primary mb-3">Tìm Kiếm</button>
</form>

<a href="{{route('khachhang.create')}}"  class="btn btn-primary mb-3">Thêm</a> 
<div class="card" >
 
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th class="product">ID</th>
            <th class="product">Họ và tên</th>
            <th class="product">giới tính</th>
            <th class="product">SĐT</th>
            <th class="product">CMND</th>
            <th class="product">Ngày sinh</th>
            <th class="product">Địa chỉ</th>
            <th class="product">email</th>
            <th class="product">Tên đăng nhập</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->hovaten}}</td>
            <td>
                @if ($item->gioitinh==0)
                    nam
                    
                @else
                    nữ
                @endif

            </td>
            <td>{{$item->sdt}}</td>
            <td>{{$item->cmnd}}</td>
            <td>{{$item->ngaysinh}}</td>
            <td>{{$item->diachi}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->tendangnhap}}</td>
            <td>{{$item->matkhau}}</td>
           
            <td>
              <a href="{{route('khachhang.edit',$item->id)}}" class="btn btn-danger">Sửa</a> 
            </td>
            <td>
             <a href="{{route('khachhang.destroy',$item->id)}}" class="btn btn-warning btndelete">Xóa</a>
           </td>
           
            </tr>
          @endforeach
        </tbody>
      </table>
      <form method="POST" action="" id="form-delete">
        @csrf @method('DELETE')
      <form>
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
