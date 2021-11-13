@extends('layouts.admin')
@section('main')
<div class="card" >
 
    <div class="card-body">
        <form action="{{route('chucvu.store')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="tenchucvu" class="form-label">Nhập tên tên chức vụ</label>
              <input type="text" class="form-control" name="tenchucvu" id="tenchucvu" >
            </div>
            <div style="height: 300px;overflow-y: auto;" class="mb-3">
            @foreach ($route as $item)
            <div style="overflow-y: auto;" class="form-check form-switch">
            
                  
             
              <input name="route[]" class="form-check-input" value="{{$item}}" type="checkbox" role="switch" id="flexSwitchCheckDefault">
              <label class="form-check-label" for="flexSwitchCheckDefault">{{$item}}</label>
             
            </div>
            @endforeach
          </div>
           
          
            <button type="submit" class="btn btn-primary">Thêm</button>
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