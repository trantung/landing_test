
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
// name    Bắt buộc    Tên khách hàng
// telephone    Bắt buộc    Điện thoại khách
// name_receiver    Bắt buộc    Tên người nhận hàng (có thể để giống tên khách)
// invoicestatus    Bắt buộc    Trạng thái đơn hàng, mặc định AutoCreated
        // subtotal Bắt buộc    Tiền hàng, mặc định : 0
// total    Bắt buộc    Tổng tiền hàng + phụ thu - giảm trừ (nếu có) : mặc định :0
//         listProduct  Bắt buộc    Mảng các giá trị về sản phẩm trong đơn hàng
// price    Bắt buộc    Giá sản phẩm
// amount   Bắt buộc    Số lượng bán
// productName  Bắt buộc    Tên sản phẩm
// productcode  Bắt buộc\

var name = "<?php echo $order['receiver_name']; ?>";
var telephone = "<?php echo $order['phone_name']; ?>";
var city = "<?php echo $order['city']; ?>";
var address = "<?php echo $order['address']; ?>";
var name_receiver = "<?php echo $order['receiver_name']; ?>";
var comment = "<?php echo $order['comment']; ?>";
var subtotal = "<?php echo $order['total_price']; ?>";
var total = "<?php echo $order['money_pay']; ?>";
var price = "<?php echo $data['price']; ?>";
var amount = "<?php echo $data['quantity']; ?>";
var productName = "<?php echo $productName; ?>";
var productcode = "<?php echo $productCode; ?>";

var data = ' "[ {\n        \"name\": \"' +name +
    '\",\n        \"telephone\": \"'+telephone+
    '\",\n        \"name_receiver\": \"'+name_receiver+
    '\",\n        \"invoicestatus\": \"AutoCreated\",\n        \"'+city+
    '\": \"\",\n        \"district\": \"\",\n        \"address\": \"'+address+
    '\",\n        \"note\": \"'+comment+'\",\n        \"hinhthucvc\": \"Chuyenthuong\",\n        \"discount_percent\": \"0.000\",\n        \"discount_amount\": \"0.000\",\n        \"s_h_amount\": \"0.000\",\n        \"ghichu1\": \"\",\n        \"ghichu2\": \"\",\n        \"notevanchuyen\": \"\",\n        \"giamgia\": \"0\",\n        \"phuthu\": \"0\",\n        \"phivanchuyen\": \"0\",\n        \"adjustment\": \"0.000\",\n        \"taxtype\": \"individual\",\n        \"deposits\": 0,\n        \"subtotal\": '+subtotal+
    ',\n        \"taxtotal_invoice\": \"0.000\",\n        \"total\": '+total+
    ',\n        \"accountid\": 0,\n        \"list_pageitem\": \"289582808317941\",\n        \"listProduct\": [\n            {\n                \"price\": \"'+price+'\",\n                \"amount\": \"'+amount+
    '\",\n                \"productName\": \"'+productName+
    '\",\n                \"productcode\": \"'+productcode+
    '\",\n                \"weight\": \"100\",\n                \"discount_percent_product\": \"0\",\n                \"discount_amount_product\": \"0\",\n                \"tax1\": \"0\",\n                \"qtyinstock\": \"0\"\n            }\n        \n    ]\n}]\n"'
;
    
console.log(data);
var xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function () {
  if (this.readyState === 4) {
    console.log(this.responseText);
  }
});

xhr.open("POST", "https://new.abit.vn/invoices/createInvoiceFromPartner/2/vinstore/Zxb9yNn2TC5fTXL");

xhr.send(data);
</script>
@include('hung.footer')