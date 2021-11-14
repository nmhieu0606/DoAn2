@extends('layouts.admin')
@section('main')
<form action="" class="form-inline">
  <div class="form-group ">
    <input class="form-control" name="tukhoa" placeholder="Nhập tên sản phẩm">
   </div>
  <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
</form>
<a href="{{route('sanpham.create')}}"  class="btn btn-primary mt-1">Thêm</a> 
<div class="card" >
 
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th width="5%" scope="col">ID</th>
            <th width="20%" scope="col">Tên sản phẩm</th>
            <th width="5%" scope="col">Ảnh</th>
            <th width="10%" scope="col">giá nhập</th>
            <th width="10%" scope="col">giá xuất</th>
            <th width="10%" scope="col">Số lượng</th>
            <th width="15%" scope="col">Nhãn hiệu</th>
            <th width="10%" scope="col">Xuất xứ</th>
            <th width="10%" scope="col">Bảo hành</th>
            <th width="10%" scope="col">Danh mục</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->tensp}}</td>
            <td >
              <img src="{{url('public/uploads')}}/{{$item->anh}}" width="30px">
            </td>
            <td>{{$item->gianhap}}</td>
            <td>{{$item->giaxuat}}</td>
            <td>{{$item->soluong}}</td>
            <td>{{$item->nhanhieu->nhanhieu}}</td>
            <td>{{$item->xuatxu->xuatxu}}</td>
            <td>{{$item->baohanh->thoigianbaohanh}}</td>
            <td>{{$item->danhmuc->tendanhmuc}}</td>
           
            <td>
                <a href="{{route('sanpham.edit',$item->id)}}" class="btn btn-danger">Sửa</a> 
            </td>
            <td>
              <a href="{{route('sanpham.destroy',$item->id)}}" class="btn btn-warning btndelete">Xóa</a>
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
<hr>


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
<div class="">{{$data->appends(request()->all())->links()}}</div>
@endsection
