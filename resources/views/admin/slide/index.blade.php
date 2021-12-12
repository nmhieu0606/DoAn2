@extends('layouts.admin')
@section('main')

<a href="{{route('slide.create')}}"  class="btn btn-primary mb-3">Thêm</a> 
<div class="card" >
 
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th width="10%" scope="col"></th>
            <th width="10%" scope="col">ID</th>
            <th width="10%" scope="col">Tên</th>
            <th width="10%" scope="col">Tên nhân viên</th>
            <th width="10%" scope="col">Trạng thái</th>
            <th width="5%" scope="col"></th>
            <th width="5%" scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
          <tr>
            <td><img style="width: 150px" src="{{url('public/slide')}}/{{$item->anh}}" alt=""></td>
            <td>{{$item->id}}</td>
            <td>{{$item->ten}}</td>
            <td>{{$item->nhanvien->hovaten}}</td>
           @if ($item->status==0)
           <td>Ẩn</td>
           @else
           <td>Hiện</td>
           @endif
            
            <td>
                <a href="{{route('slide.edit',$item->id)}}" class="btn btn-danger">Sửa</a> 
            </td>
            <td>
              <a  href="{{route('slide.destroy',$item->id)}}" class="btn btn-warning btndelete">Xóa</a>
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
