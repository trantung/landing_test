
@include('hung.header')


<div class="layui-container">
    <div class="layui-header">
        <div class="layui-row header">
            <div class="layui-col-xs3"> <a style="color:#ffffff; text-decoration:none;" href="/"><i class="layui-icon"></i>Trang chủ</a> </div>
            <div class="layui-col-xs6 logo"> Đặt đơn thành công </div>
        </div>
    </div>
    <div class="layui-main" style="padding-bottom: 10px;background-color:#FFF;">
<div class="explain">
  <div class="imgbox"> <img src="images/hung/images/anh-tb.png" class="img_list"><span>Đặt đơn thành công </span> </div>
  <div>
    <ul class="pay_list">
      <li> <span class="tips1">Phương thức thanh toán :</span> <span class="tips2">Nhận hàng thanh toán</span> </li>
        <li> <span class="tips1">Mã đơn hàng:</span> <span class="tips2"> {{$orderId}} </span> </li>
        <?php $t = 30000000;?>
        <!-- <?php $t //= $_GET["n"]; ?> -->
      <li> <span class="tips1">Số tiền thanh toán :</span> <span class="tips2">{{number_format($money)}} VNĐ</span> </li>
    </ul>
  </div>
  <p style="margin-bottom: 38px;" id="order_tips">Chúc mừng bạn, đơn hàng đã đặt mua thành công. Chúng tôi đã nhận được đơn hàng của bạn, và sẽ sớm phát hàng cho bạn.</p>
</div>
<div class="m-orderItem">
  <div class="reminder_title"><i class="reminder_icon"></i>Lưu ý</div>
  <div class="reminder">{{$config->text_order_notify}}</div>
</div>
    </div>
</div>
<div class="timetips layui-row">
    <ul>
        <li style="text-align: center; width:100%; color: #000000">{{$config->text_footer_order}}</li>
    </ul>
</div>
@include('hung.footer')