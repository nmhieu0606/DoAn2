@extends('layouts.admin')
@section('main')
  
      <div class="container-fluid">
       
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$sp->count()}}</h3>

                <p>Tổng sản phẩm</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('sanpham.index')}}" class="small-box-footer">Chi tiết<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$dh->count()}}<sup style="font-size: 20px"></sup></h3>

                <p>Đơn hàng</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{route('donhang.index')}}" class="small-box-footer">Chi tiết<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$kh->count()}}</h3>

                <p>Khách hàng đăng kí</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('khachhang.index')}}" class="small-box-footer">Chi tiết<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$nv->count()}}</h3>

                <p>Nhân viên</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{route('nhanvien.index')}}" class="small-box-footer">Chi tiết<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
        </div>
        <div id="chart" style="height: 250px;"></div>
        <div class="panel panel-default">
          <form id="form_danhthu" action="" method="GET">
        
            <div class="row g-3 align-items-center">
              <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">Từ ngày</label>
              </div>
              <div class="col-auto">
                <input type="date" name="ngaybatdau"  class="form-control" aria-describedby="passwordHelpInline">
              </div>
              <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">-- Đến ngày</label>
              </div>
              <div class="col-auto">
                <input type="date" name="ngayketthuc" class="form-control" aria-describedby="passwordHelpInline">
              </div>
              <button type="submit" class="btn btn-primary">Tìm</button>
            </div>
          <form>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Khách hàng</th>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Nhân viên giao hàng</th>
                <th scope="col">Tổng tiền</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($dh1))
              <?php $stt=1; ?>
              @foreach ($dh1 as $d)
              <tr>
                <th >{{$stt}}</th>
                <td>{{$d->khachhang->hovaten}}</td>
                <td>{{$d->id}}</td>
                <td>{{$d->ngaydathang}}</td>
                @if(isset($d->nhanvien->hovaten))
                <td>{{$d->nhanvien->hovaten}}</td>   
                @else
                <td>Chưa nhận đơn</td>
                @endif
                <td>{{number_format($d->tongtien)}}</td>
              </tr>
              <?php $stt++; ?>
              @endforeach
              @endif
            </tbody>
          </table>
         
        </div>

        @if (isset($dh1))
        <div style="width: auto;" class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div style="width: auto;" class="inner">
                <p>Tổng doanh thu</p>
                <h3 style="width: auto;">{{number_format($dh1->sum('tongtien'))}}.VND   </h3> 
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('sanpham.index')}}" class="small-box-footer">Chi tiết<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endif
         
          <table class="table">
           
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($sp as $item)
              @if ($item->soluong==0)
              <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->tensp}}</td>
                <td>{{$item->soluong}}</td>
                <td>@mdo</td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
      </div>
    


  @endsection
  @section('js')
      <script>
      
         var chart= Morris.Bar({
            element: 'chart',
            parseTime:false,
            data: [
              0,0
            ],
            xkey: 'ngaydathang',
            ykeys: ['sum','tongtien','id'],
            labels: ['Danh thu','Tổng tiền','id']
          });
       


        $('#form_danhthu').on('submit',function(e){
          e.preventDefault();
          var ngay=$(this).serialize();
          $.get("{{route('admin.index')}}?"+ngay,function(res){
              chart.setData(res);

          });
        })

      </script>
      
  @endsection
