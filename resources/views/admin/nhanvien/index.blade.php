@extends('layouts.admin')
@section('main')
<form action="" method="GET" class="form-inline">
  <div class="form-group ">
    <input class="form-control" name="tukhoa" placeholder="Nhập tên danh mục">
   </div>
  <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
</form>

<a href="{{route('nhanvien.create')}}"  class="btn btn-primary mt-1">Thêm</a> 
<div class="card" >
 
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th width="5%" scope="col">ID</th>
            <th width="30%" scope="col">Họ và tên</th>
            <th width="5%" scope="col">Giới tính</th>
            <th width="10%" scope="col">Ngày sinh</th>
            <th width="10%" scope="col">Địa chỉ</th>
            <th width="10%" scope="col">SĐT</th>
            <th width="10%" scope="col">CMND</th>
            <th width="10%" scope="col">Chức vụ</th>
            <th width="10%" scope="col">Tên đăng nhập</th>
            <th width="10%" scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->hovaten}}</td>
            <td>
                @if ($item->gioitinh==0)
                    Nam
                    
                @else
                    Nữ
                @endif
            </td>
            <td>{{$item->ngaysinh}}</td>
            <td>{{$item->diachi}}</td>
            <td>{{$item->sdt}}</td>
            <td>{{$item->cmnd}}</td>
            {{-- <td>{{$item->chucvu->tenchucvu}}</td> --}}
            <td>{{$item->tendangnhap}}</td>
            <td>{{$item->email}}</td>
           
            <td>
              <a href="{{route('nhanvien.edit',$item->id)}}" class="btn btn-danger">Sửa</a> 
            </td>
            <td>
             <a href="{{route('nhanvien.destroy',$item->id)}}" class="btn btn-warning btndelete">Xóa</a>
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
