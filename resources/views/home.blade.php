@extends('layouts.site')
@section('main')
    <div class="main_content">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div id="slideshow">
                        <div class="slide-wrapper">
                        @foreach ($slide as $item)
                            @if ($item->status==1)
                          <div class="slide"><img src="{{url('public/slide')}}/{{$item->anh}}"></div>
                          @endif
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="product_header_left">
                        <div class="custom_select">
                            <div style="background-color: #ff324d; color: white;" class="alert alert-primary" role="alert">
                               SALE
                              </div>
                        </div>
                    </div>
                    @foreach ($sanpham_i as $item)
                    @if ($item->soluong>=1&&$item->sale!=null)
                    <div class="col-4">
                      
                        <div class="row shop_container list">
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="product">
                                    <span class="pr_flash bg-success">Sale</span>
                                    <div class="product_img">
                                        <a href="shop-product-detail.html">
                                            <img src="{{url('public/uploads')}}/{{$item->anh}}" alt="product_img">
                                        </a>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="shop-product-detail.html">{{$item->tensp}}</a></h6>
                                            <div class="product_price">
                                                <span class="price">{{number_format($item->giasale)}}đ</span>
                                                <del>{{number_format($item->giaxuat)}}</del>
                                                <div class="on_sale">
                                                    <span>{{$item->sale}}% Off</span>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        
                                    </div>
                                    <div class="list_product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart "><a class="btn-themvaogio" type="button" href="{{route('home.themgiohang',$item->id)}}"><i class="icon-basket-loaded "></i>Thêm</a></li>
                                            <a href="{{route('home.chitiet',$item->id)}}" type="button" class="btn btn-outline-primary">Chi tiết</a>
                                        </ul>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <hr>
                                <div class="">{{$sanpham_i->appends(request()->all())->links()}}</div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @endforeach
                </div>

                <div class="row"> 
                    <div class="product_header_left">
                        <div class="custom_select">
                            <div style="background-color: #F6F45F; color: black;" class="alert alert-warning" role="alert">
                               New
                              </div>
                        </div>
                    </div>
                    @foreach ($sanpham_i as $item)
                    @if ($item->soluong>=1&&$item->sale==null)
                    <div class="col-4">
                      
                        <div class="row shop_container list">
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="product">
                                    <span class="pr_flash">New</span>
                                    <div class="product_img">
                                        <a href="shop-product-detail.html">
                                            <img src="{{url('public/uploads')}}/{{$item->anh}}" alt="product_img">
                                        </a>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="shop-product-detail.html">{{$item->tensp}}</a></h6>
                                            <div class="product_price">
                                                <span class="price">{{number_format($item->giaxuat)}}đ</span>
                                                {{-- <del>$99.00</del>
                                                <div class="on_sale">
                                                    <span>20% Off</span>
                                                </div> --}}
                                            </div>
                                           
                                        </div>
                                        
                                    </div>
                                    <div class="list_product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart "><a class="btn-themvaogio" type="button" href="{{route('home.themgiohang',$item->id)}}"><i class="icon-basket-loaded "></i>Thêm</a></li>
                                            <a href="{{route('home.chitiet',$item->id)}}" type="button" class="btn btn-outline-primary">Chi tiết</a>
                                        </ul>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <hr>
                                <div class="">{{$sanpham_i->appends(request()->all())->links()}}</div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endsection
    