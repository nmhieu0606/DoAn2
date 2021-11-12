
<div class="mb3">
    <h1>Hóa đơn</h1>
</div>
 
        <label for="hovaten" class="form-label">Họ và tên: {{Auth::guard('khachhang')->user()->hovaten}}</label>
<br>

    
  
        <label for="diachi" class="form-label">Địa chỉ: {{Auth::guard('khachhang')->user()->diachi}}</label>
       
        <br>
   
        <label for="sdt" class="form-label">SĐT: {{Auth::guard('khachhang')->user()->sdt}}</label>
        <br>
  
   
        <label for="email" class="form-label">Email: {{Auth::guard('khachhang')->user()->email}}</label>
       
        <br>
  

<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($giohang->items as $stt=> $item)
            
        
        <tr>
            <td>{{$stt++}}</td>
            <td>{{$item['tensp']}}</td>
            <td>{{number_format($item['gia'])}}</td>
            <td>{{$item['soluong']}}</td>
            <td>{{number_format($item['gia']*$item['soluong'])}}</td>
        </tr>
        @endforeach
    </tbody>
</table>  

<div class="heading_s1 mr-0">
    <h4>Tổng tiền :   {{number_format($giohang->gia)}}</h4>
</div>
</div>
          
 