<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đơn hàng</title>
    <style>
        body{
            font-family: "DejaVu Sans";
        }
        table{
            width: 100%;
            border: 1px solid #333;
            margin-bottom: 25px;
            border-collapse: collapse;
        }
        table tr th,
        table tr td{
            border: 1px;
            padding: 10px;
            box-sizing: border-box;
            text-align: left;
        }


    </style>
</head>
<body>
    


 
 
        <h1 style="text-align: center; color: red;">Shop Mobile</h1>
        <h2 style="text-align: center; color: red;">Đơn hàng : {{$dh->id}}</h2>
        <hr>
        
        
        <table class="table table-bordered border-primary">
           
            <tbody>
                <tr>
                    <td width=200px>Họ và tên</td>
                  <td>{{$dh->khachhang->hovaten}}</td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>{{$dh->khachhang->diachi}}</td>
                </tr>
                <tr>
                    <td>SĐT</td>
                    <td>{{$dh->khachhang->sdt}}</td>
                   
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{$dh->khachhang->email}}</td>
                   
                </tr>
               
            </tbody>
           
        </table>
        <hr>
        @if (isset($dh->nhanvien_id)) 
            <table >
                <tbody>
                    <tr>
                        <td width=200px>Nhân viên giao hàng</td>
                    <td>{{$dh->nhanvien->hovaten}}</td>
                    
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                    
                        <td>{{$dh->nhanvien->diachi}}</td>
                    
                    </tr>
                    <tr>
                        <td>SĐT</td>
                        <td>{{$dh->nhanvien->sdt}}</td>
                    
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$dh->nhanvien->email}}</td>
                    
                    </tr>
                    <tr>
                        <td>Tình trạng đơn hàng:</td>
                        <td style="color: red;">{{$dh->tinhtrang->tinhtrang}}</td>
                    
                    </tr>
                
                </tbody>
            </table>
        @endif
            <hr>
        <table class="table">
            <thead>
                
                <tr>
                    <th class="product-thumbnail"></th>
                    <th class="product-thumbnail">Sản phẩm</th>
                    <th class="product-name">Đơn giá</th>
                    <th class="product-price">Số lượng</th>
                    <th class="product-quantity">Thành tiền</th> 
                </tr>
            </thead>
            <tbody>
                @foreach ($dh->dathang_chitiet as $item)
                <tr>
                    <td  ><img width="50px" src="{{url('public/uploads')}}/{{$item->sanpham->anh}}"></td>
                    <td  >{{$item->sanpham->tensp}}</td>
                    <td  >{{number_format($item->sanpham->giaxuat)}}.VND</td>
                    <td  >{{$item->soluong}}</td>
                    <td  >{{number_format($item->soluong*$item->sanpham->giaxuat)}}.VND</td>
                </tr>  
                @endforeach
                
            </tbody>
        </table>
     
   


</body>
</html>