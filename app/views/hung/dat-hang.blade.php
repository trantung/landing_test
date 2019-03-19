<script>
function showHint_1553008285380(str) {
var hoten = document.getElementById('ab_hoten_1553008285380');
var sodt = document.getElementById('ab_sodt_1553008285380');
var email = document.getElementById('ab_email_1553008285380');
var address = document.getElementById('ab_address_1553008285380');
var username = 'hungnn';
var access = 'hungnn';
var domain = 'http://landingpageso1.tk';
var mobile = '';
var mahang = '';
var name = '';
var giaban = '';
var message = '';
var chiendich = '';
var nhomchiendich = '';
var nhanvien = '';
var chanel = '';
var params_str = "name=" + hoten.value + "&mobile=" + sodt.value + "&email=" + email.value + "&message=" + address.value + "&username=" + username + "&access=" + access + "&domain=" + domain + "&mo=" + mobile.value + "&mahang=" + mahang + "&na=" + name.value + "&gia=" + giaban + "&me=" + message.value + "&chiendich=" + chiendich + "&nhomchiendich=" + nhomchiendich + "&nhanvien=" + nhanvien + "&chanel=" + chanel;
var params = typeof params_str == 'string' ? params_str : Object.keys(params_str).map(
function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(params_str[k]) }
).join('&');

if ((hoten.value.trim() == "")) {
alert("Vui lòng nhập họ tên của bạn");
hoten.focus();
return (false);
}

if ((sodt.value.trim() == "")) {
alert("Vui lòng nhập số điện thoại thường dùng của bạn");
sodt.focus();
return (false);
}

var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {

if (xmlhttp.readyState==4 && xmlhttp.status==200){
document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
alert("Đã gửi thông tin đăng ký thành công!");
// thay url cua ban sau khi gui thong tin thanh cong
window.location.assign("http://landingpageso1.tk");
}
}
xmlhttp.open("POST", "https://abit.vn/invoicefromwebecommerce.php", true);
xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
xmlhttp.send(params);
}
</script><div class="wrap_contact_form" style="width: 260px; height: 340px; background-color: rgba(81, 130, 33, 0.87); border: 8px solid rgb(198, 203, 125);">
<div class="contact_form" style="padding: 15px;">
<h3 style="color: #fff; text-align: center; margin: 15px 0;">Đăng Ký Mua Hàng</h3>
<form action="">
<div class="form-group">
<input type="text" class="form-control" id="ab_hoten_1553008285380" placeholder="Họ tên ..." style="height: 30px; width: 208px; border: 1px solid #cccccc; padding: 0 10px; display: inline-block; border-radius: 3px; margin-bottom: 5px; background-color: #ffffff;">
</div>
<div class="form-group">
<input type="number" class="form-control" id="ab_sodt_1553008285380" placeholder="Số điện thoại ..." style="height: 30px; width: 208px; border: 1px solid #cccccc; padding: 0 10px; display: inline-block; border-radius: 3px; margin-bottom: 5px; background-color: #ffffff;">
</div>
<div class="form-group">
<input type="email" class="form-control" id="ab_email_1553008285380" placeholder="Email ..." style="height: 30px; width: 208px; border: 1px solid #cccccc; padding: 0 10px; display: inline-block; border-radius: 3px; margin-bottom: 5px; background-color: #ffffff;">
</div>
<div class="form-group">
<textarea id="ab_address_1553008285380" placeholder="Địa chỉ giao hàng ..." class="form-control" style="width: 208px; height: 60px; border: 1px solid #cccccc; padding: 10px; display: inline-block; border-radius: 3px; margin-bottom: 5px;resize: inherit; background-color: #ffffff;"></textarea>
</div>
<div class="form-group" style="text-align: center; margin-top: 5px;">
<input type="button" value="ĐĂNG KÝ NGAY" id="txt1" onclick="showHint_1553008285380(this.value)" style="padding: 10px 25px; background-color: #e6a23c; border: 1px solid #cccccc; color: #ffffff; font-weight: bold; cursor: pointer;"/>
</div>
</form>
<p>
<span id="txtHint"></span>
</p>