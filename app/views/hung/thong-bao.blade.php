
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
<script type="text/javascript">
    var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://new.abit.vn/invoices/createInvoiceFromPartner/2/vinstore/Zxb9yNn2TC5fTXL",
  "method": "POST",
  "headers": {
    "content-type": "application/json",
  },
  "processData": false,
  "data": "\n   [ {\n        \"name\": \"tung tran thanh\",\n        \"telephone\": \"0123456789\",\n        \"name_receiver\": \"Mr Du\",\n        \"invoicestatus\": \"AutoCreated\",\n        \"city\": \"\",\n        \"district\": \"\",\n        \"address\": \"203 Minh Khai\",\n        \"note\": \"\",\n        \"hinhthucvc\": \"Chuyenthuong\",\n        \"discount_percent\": \"0.000\",\n        \"discount_amount\": \"0.000\",\n        \"s_h_amount\": \"0.000\",\n        \"ghichu1\": \"\",\n        \"ghichu2\": \"\",\n        \"notevanchuyen\": \"\",\n        \"giamgia\": \"0\",\n        \"phuthu\": \"0\",\n        \"phivanchuyen\": \"0\",\n        \"adjustment\": \"0.000\",\n        \"taxtype\": \"individual\",\n        \"deposits\": 0,\n        \"subtotal\": 450000,\n        \"taxtotal_invoice\": \"0.000\",\n        \"total\": 450000,\n        \"accountid\": 0,\n        \"list_pageitem\": \"289582808317941\",\n        \"listProduct\": [\n            {\n                \"price\": \"250000\",\n                \"amount\": \"2\",\n                \"productName\": \"SP Xoay 3 vòng\",\n                \"productcode\": \"xoay-3-vong11\",\n                \"weight\": \"100\",\n                \"discount_percent_product\": \"0\",\n                \"discount_amount_product\": \"0\",\n                \"tax1\": \"0\",\n                \"qtyinstock\": \"0\"\n            },\n            {\n                \"price\": \"298000\",\n                \"amount\": \"3\",\n                \"storeId\": 1,\n                \"productName\": \"Giày Boot Nam Cao Cổ Khâu Đế Màu Đen Da Sần M89-38\",\n                \"productcode\": \"M89-38222\",\n                \"weight\": \"100\",\n                \"discount_percent_product\": \"0\",\n                \"discount_amount_product\": \"0\",\n                \"tax1\": \"0\",\n                \"qtyinstock\": \"0\"\n            }\n        ]\n    }\n]\n"
}

$.ajax(settings).done(function (response) {
  console.log(response);
});
</script>
@include('hung.footer')