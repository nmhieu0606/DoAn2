@extends('layouts.admin')
@section('main')
<form action="" method="GET" class="form-inline">
  <div class="form-group ">
    <input class="form-control mb-3" name="tukhoa" placeholder="Nhập tên khách hàng">
   </div>
  <button type="submit" class="btn btn-primary mb-3">Tìm Kiếm</button>
</form>
<a href="{{route('chucvu.create')}}"  class="btn btn-primary mb-3">Thêm</a> 
<div class="card" >
 
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th width="10%" scope="col">ID</th>
            <th width="70%" scope="col">Tên chức vụ</th>
            <th width="70%" scope="col">Quyền</th>
            <th width="10%" scope="col"></th>
            <th width="10%" scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->tenchucvu}}</td>
            <td></td>
            <td>
                <a href="{{route('chucvu.edit',$item->id)}}" class="btn btn-danger">Sửa</a> 
            </td>
            <td>
              <a  href="{{route('chucvu.destroy',$item->id)}}" class="btn btn-warning btndelete">Xóa</a>
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
