@foreach ($cm as $item)
<div class="media">

    <a href="" class="pull-left mr-2">
        <img width="50px" style="border-radius: 50px;" class="media-object" src="{{url('public/khachhang')}}/{{$item->khachhang->anh}}" alt="image">
    </a>
    <div class="media-body">
        <h4 class="media-heading">{{$item->khachhang->hovaten}}</h4>
        <p>{{$item->comment}}</p>
        @if (Auth::guard('khachhang')->check())
        <p><a  class="btn btn-sm btn-primary btn-reply" data-id="{{$item->id}}" href="">Trả lời</a></p>
        <form method="POST" style="display:none;" class="FORM-REPLY form-reply-{{$item->id}}">
            <h3>Bình luận ở đây</h3>
            <div class="mb-3">
              <textarea id="comment-reply-{{$item->id}}" type="text" class="form-control " class=""  ></textarea>
            </div>
            
            <button data-id="{{$item->id}}" type="submit"  class="btn btn-primary btn-send-comment-reply">Gửi bình luận</button>
        </form>
        @else
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Đăng nhập để trả lời 
        </button>
        @endif

        <hr>
        @foreach ($item->child_reply as $i)
        <div class="media">

            <a href="" class="pull-left mr-2">
                <img style="border-radius: 500px" width="50px" class="media-object" src="{{url('public/khachhang')}}/{{$i->khachhang->anh}}" alt="image">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$i->khachhang->hovaten}}</h4>
                <p>{{$i->comment}}</p>
               
            </div>
        </div>
        @endforeach
    </div>
</div>
@endforeach