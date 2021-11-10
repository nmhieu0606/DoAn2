@extends('layouts.admin')
@section('main')
<form action="" method="GET" class="form-inline">
  <div class="form-group ">
    <input class="form-control" name="tukhoa" placeholder="Nhập tên danh mục">
   </div>
  <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
</form>

<a href="{{route('danhmuc.create')}}"  class="btn btn-primary mt-1">Thêm</a> 
@if (session('status'))
        <div class="alert alert-info">{{session('status')}}</div>
@endif
<div class="card" >
 
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th width="10%" scope="col">ID</th>
            <th width="70%" scope="col">Tên danh mục</th>
            <th width="70%" scope="col">Danh mục cha</th>
            <th width="10%" scope="col"></th>
            <th width="10%" scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php showdanhmuc($danhmuc)?>
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
<?php
function showdanhmuc($danhmuc, $parent_id = 0, $char = '')
{
    foreach ($danhmuc as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->parent_id == $parent_id)
        {
            echo '<tr>';
              echo'<td>'.$item->id.'</td>
              <td>'.$char.$item->tendanhmuc.'</td>
              <td>'.$item->parent_id.'</td>
            
              <td>
                <a href="'.route('danhmuc.edit',$item->id).'" class="btn btn-danger">Sửa</a> 
              </td>
              <td>
              <a  href="'.route('danhmuc.destroy',$item->id).'" class="btn btn-warning btndelete">Xóa</a>
              </td>';
         
            echo '</tr>';
             
            // Xóa chuyên mục đã lặp
            unset($danhmuc[$key]);
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showdanhmuc($danhmuc, $item->id, $char.'---');
        }
    }
}







?>