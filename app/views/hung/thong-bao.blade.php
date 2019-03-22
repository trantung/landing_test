
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
    console.log(1111);
  $.ajax({
    url: "https://new.abit.vn/invoices/createInvoiceFromPartner/2/vinstore/Zxb9yNn2TC5fTXL",
    type: "post",
    dataType: 'jsonp',
    crossDomain: true,
    data: {
            "name": "tunglaso2",
            "telephone": "0123456789",
            "name_receiver": "Mr Du",
            "invoicestatus": "AutoCreated",
            "city": "",
            "district": "",
            "address": "203 Minh Khai",
            "note": "",
            "hinhthucvc": "Chuyenthuong",
            "discount_percent": "0.000",
            "discount_amount": "0.000",
            "s_h_amount": "0.000",
            "ghichu1": "",
            "ghichu2": "",
            "notevanchuyen": "",
            "giamgia": "0",
            "phuthu": "0",
            "phivanchuyen": "0",
            "adjustment": "0.000",
            "taxtype": "individual",
            "deposits": 0,
            "subtotal": 450000,
            "taxtotal_invoice": "0.000",
            "total": 450000,
            "accountid": 0,
            "list_pageitem": "289582808317941",
            "listProduct": [
                {
                    "price": "250000",
                    "amount": "2",
                    "productName": "SP Xoay 3 vòng",
                    "productcode": "xoay-3-vong11",
                    "weight": "100",
                    "discount_percent_product": "0",
                    "discount_amount_product": "0",
                    "tax1": "0",
                    "qtyinstock": "0"
                },
                {
                    "price": "298000",
                    "amount": "3",
                    "storeId": 1,
                    "productName": "Giày Boot Nam Cao Cổ Khâu Đế Màu Đen Da Sần M89-38",
                    "productcode": "M89-38222",
                    "weight": "100",
                    "discount_percent_product": "0",
                    "discount_amount_product": "0",
                    "tax1": "0",
                    "qtyinstock": "0"
                }
            ]
        },
    success: function (data) {
      console.log('tunglaso1');
    },
    error: function(jqXHR, textStatus, errorThrown) {
       console.log(textStatus, errorThrown);
    }
});
</script>
@include('hung.footer')