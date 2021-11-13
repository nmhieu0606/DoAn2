@foreach ($cm as $item)
<div class="media">

    <a href="" class="pull-left mr-2">
        <img class="media-object" src="" alt="image">
    </a>
    <div class="media-body">
        <h4 class="media-heading">{{$item->khachhang->hovaten}}</h4>
        <p>{{$item->comment}}</p>
        <p><a class="btn btn-sm btn-primary" href="">Trả lời</a></p>
        @if (Auth::guard('khachhang')->check())
        <form >
            <h3>Bình luận ở đây</h3>
            <div class="mb-3">
              <textarea type="text" class="form-control " id="exampleInputEmail1" ></textarea>
              
            </div>
            
            <button type="submit" class="btn btn-primary">Gửi bình luận</button>
        </form>
        @else
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Vui lòng đăng nhập
        </button>
        @endif

        <hr>
        @foreach ($item->child_reply as $i)
        <div class="media">

            <a href="" class="pull-left mr-2">
                <img class="media-object" src="" alt="image">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$i->khachhang->hovaten}}</h4>
                <p>{{$i->comment}}</p>
                <p><a class="btn btn-sm btn-primary" href="">Trả lời</a></p>
                <form>
                    <h3>Bình luận ở đây</h3>
                    <div class="mb-3">
                        <input hidden value="{{$data->id}}" type="text">
                    
                      
                      <textarea type="text" class="form-control " id="exampleInputEmail1" ></textarea>
                      
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endforeach