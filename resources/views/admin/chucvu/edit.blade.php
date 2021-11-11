@extends('layouts.admin')
@section('main')

<a href="#"  class="btn btn-primary mb-3">Sửa</a> 
<div class="card" >
 
    <div class="card-body">
        <form action="{{route('chucvu.update',$data->id)}}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
              <label for="tenchucvu" class="form-label">Nhập tên tên chức vụ</label>
              <input value="{{$data->tenchucvu}}" type="text" class="form-control" name="tenchucvu" id="tenchucvu" >
            </div>
            <div style="height: 300px;overflow-y: auto;" class="mb-3">
            @foreach ($route as $item)
          <?php $checked=in_array($item,$quyen) ?'checked':''; 
          ?>
           
            <div style="overflow-y: auto;" class="form-check form-switch">
            
                  
             
              <input name="route[]" {{$checked}} class="form-check-input" value="{{$item}}" type="checkbox" role="switch" id="flexSwitchCheckDefault">
              <label class="form-check-label" for="flexSwitchCheckDefault">{{$item}}</label>
             
            </div>
         
            @endforeach
          </div>
           
          
            <button type="submit" class="btn btn-primary">Submit</button>
            <label >
              <input id="checkAll"  type="checkbox" >Chọn tất cả
              </label>
          </form>
          
        </div>

</div>

@endsection
@section('js')
<script>
$("#checkAll").click(function(){
  $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
@endsection