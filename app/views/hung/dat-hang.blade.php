@include('hung.header')
      <div class="layui-container">
        <div class="layui-header">
          <div class="layui-row header">
            <div class="layui-col-xs3"><a style="color:#ffffff; text-decoration:none;" href="/"> Trang chủ</a></div>
            <div class="layui-col-xs6 logo"> Thông tin xác nhận đơn hàng </div>
          </div>
        </div>
        <div class="layui-main" style="padding-bottom: 0;">
          <!-- <form class="layui-form layui-form-pane" name="addorder" action="http://localhost/ionlinei.com/thong-bao.php" method="POST"> -->
            {{ Form::open(array('action' => array('OrderController@order'), 'method' => "POST", 'class' => 'layui-form layui-form-pane')) }}
            <input type="hidden" name="title" value="{{$product->text}}">
            <input type="hidden" name="code" value="{{$product->code}}">
            <input type="hidden" name="color" value="{{$product->color}}">
            <input type="hidden" name="number" value="{{$number}}">
            <input type="hidden" name="product_id" value="{{$product->id}}">
            
            <div class="safety-tips">
              <div class="safe"><i class="iconfont icon-safedun"></i></div>
            Bạn đang mua sắm an toàn, hãy yên tâm mua sắm</div>
            <style>
            .layui-form-item .layui-input-inline{width: 90%;margin:0 0 10px 0;float:left;}
            .layui-form-item .layui-input-inline+.layui-form-mid{margin-left: 10px;color:#ff0000!important;top:auto;}
          </style>
          <div class="newAddress">
            <h2>Người nhận hàng</h2>
            <div class="layui-form-item">
              <div class="layui-input-inline">
                <input type="text" name="fullname" lay-filter="name" autocomplete="off" class="layui-input" placeholder="Vui lòng điền chính xác họ tên"><span style="color: red">*</span>
              </div>
            </div>
            <div class="layui-form-item">
              <div class="layui-input-inline">
                <input type="number" name="phone" autocomplete="off" class="layui-input" placeholder="Vui lòng điền chính xác số điện thoại">
                <span style="color: red">*</span>
              </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-inline">
                  <input type="text" name="email" autocomplete="off" class="layui-input" placeholder="E-Mail">
                  <span style="color: #ffffff">*</span>
                 </div>
            </div>
            <div class="layui-form-item">
              <div class="layui-input-inline" style="margin:0;">
                <select name="city" id="city" lay-filter="city" lay-ignore>
                  <option value="ha-noi">Hà Nội</option>
                  <option value="tp-ho-chi-minh">Hồ Chí Minh</option>
                  <option value="da-nang">Đà Nẵng</option>
                  <option value="hai-phong">Hải Phòng</option>
                  <option value="quang-ninh">Quảng Ninh</option>
                  <option value="binh-duong">Bình Dương</option>
                  <option value="dong-nai">Đồng Nai</option>
                  <option value="an-giang">An Giang</option>
                  <option value="ba-ria-vung-tau">Bà Rịa Vũng Tàu</option>
                  <option value="bac-giang">Bắc Giang</option>
                  <option value="bac-kan">Bắc Kạn</option>
                  <option value="bac-lieu">Bạc Liêu</option>
                  <option value="bac-ninh">Bắc Ninh</option>
                  <option value="ben-tre">Bến Tre</option>
                  <option value="binh-dinh">Bình Định</option>
                  <option value="binh-phuoc">Bình Phước</option>
                  <option value="binh-thuan">Bình Thuận</option>
                  <option value="ca-mau">Cà Mau</option>
                  <option value="can-tho">Cần Thơ</option>
                  <option value="cao-bang">Cao Bằng</option>
                  <option value="dak-lak">Đắk Lắk</option>
                  <option value="dak-nong">Đắk Nông</option>
                  <option value="dien-bien">Điện Biên</option>
                  <option value="dong-thap">Đồng Tháp</option>
                  <option value="gia-lai">Gia Lai</option>
                  <option value="ha-giang">Hà Giang</option>
                  <option value="ha-nam">Hà Nam</option>
                  <option value="ha-tinh">Hà Tĩnh</option>
                  <option value="hai-duong">Hải Dương</option>
                  <option value="hau-giang">Hậu Giang</option>
                  <option value="hoa-binh">Hòa Bình</option>
                  <option value="hung-yen">Hưng Yên</option>
                  <option value="khanh-hoa">Khánh Hòa</option>
                  <option value="kien-giang">Kiên Giang</option>
                  <option value="kon-tum">Kon Tum</option>
                  <option value="lai-chau">Lai Châu</option>
                  <option value="lam-dong">Lâm Đồng</option>
                  <option value="lang-son">Lạng Sơn</option>
                  <option value="lao-cai">Lào Cai</option>
                  <option value="long-an">Long An</option>
                  <option value="nam-dinh">Nam Định</option>
                  <option value="nghe-an">Nghệ An</option>
                  <option value="ninh-binh">Ninh Bình</option>
                  <option value="ninh-thuan">Ninh Thuận</option>
                  <option value="phu-tho">Phú Thọ</option>
                  <option value="phu-yen">Phú Yên</option>
                  <option value="quang-binh">Quảng Bình</option>
                  <option value="quang-nam">Quảng Nam</option>
                  <option value="quang-ngai">Quảng Ngãi</option>
                  <option value="quang-tri">Quảng Trị</option>
                  <option value="soc-trang">Sóc Trăng</option>
                  <option value="son-la">Sơn La</option>
                  <option value="tay-ninh">Tây Ninh</option>
                  <option value="thai-binh">Thái Bình</option>
                  <option value="thai-nguyen">Thái Nguyên</option>
                  <option value="thanh-hoa">Thanh Hóa</option>
                  <option value="thua-thien-hue">Thừa Thiên Huế</option>
                  <option value="tien-giang">Tiền Giang</option>
                  <option value="tra-vinh">Trà Vinh</option>
                  <option value="tuyen-quang">Tuyên Quang</option>
                  <option value="vinh-long">Vĩnh Long</option>
                  <option value="vinh-phuc">Vĩnh Phúc</option>
                  <option value="yen-bai">Yên Bái</option>
                  <option value="NA">Khác</option>
                </select>
                <span style="color: red">*</span>
              </div>
             
              <div class="layui-input-inline" style="display:none;">
                <select name="area" id="area" lay-ignore>
                  <option>--</option>
                </select>
              </div>
            </div>
            <div class="layui-form-item">
              <div class="layui-input-inline">
                <input type="text" name="detailed" autocomplete="off" class="layui-input" placeholder="Vui lòng điền chính xác địa chỉ và thời gian nhận hàng">
                <span style="color: red">*</span>
              </div>
            </div>
            <br />
          </div>
          <div class="cartLogistics">
            <h2>Phương thức thanh toán</h2>
            <div class="layui-form-item">
              <label class="layui-form-label" style="width: auto;">Nhận hàng thanh toán</label>
            </div>
          </div>
          <div class="cartItems">
            <h2>Chi tiết đơn hàng</h2>
            <ul>
              <li class="list-item">
                <div class="item-inner" style="overflow:hidden;">
                  <div class="item-thumb"><img src="{{$product->image_url}}"></div>
                  <div class="item-info">
                    <h4 class="title" style="padding:0;">{{$product->text}}</h4>
                    <?php
                   
                          function format_price($money, $cur){
                              $str = "";
                              if($money != 0){
                                  $num = (float)$money;
                                  //$str = sprintf("%01.0d", $num);
                                  $str = number_format($num,0,'.',',');
                                  $str .= $cur;
                                  $str = "<span>".$str."</span>";
                              }
                              return $str;
                          }

                           // // $n = $_GET["n"]; 
                           // $n = 8; 
                           // // $color = $_GET["color"];
                           // $color = 'xanh';
                           // $gia = 250000;
                           $total_price =  $number*$product->price;
                           $discount_number = $discount->number;
                           if ($number >= $discount_number) {
                            $percent = $discount->percent;
                            $money_discount = $total_price * $percent/100;
                            $money_pay =  $total_price - $money_discount;
                           } else {
                            $money_discount = 0;
                            $money_pay =  $total_price;
                            $percent = 0;
                           }
                           
                      ?>
                    <p class="size">{{ $product->color }}-</p>
                    <p class="price">{{$product->price}} x {{$number}}　VNĐ</p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="cartOrder">
            <h2 id="allmoney">Giá đơn hàng<span> <?php echo  format_price($total_price, 'VNĐ'); ?> </span></h2>
            <ul class="checkout-money" style="overflow: hidden;">
              <li class="item-money">{{$config->text_discount_payment}} <span>{{$percent}}%</span></li>
              <li class="item-money">Tổng tiền <span><?php echo  format_price($money_pay, 'VNĐ'); ?></span></li>
              <li class="item-money" id="yf">Phí vận chuyển <span>Miễn phí vận chuyển</span></li>
            </ul>
            <input type="hidden" name="total_price" value="{{$total_price}}">
            <input type="hidden" name="money_pay" value="{{$money_pay}}">
          </div>
          <div class="newAddress">
            <h2>Ghi chú</h2>
            <div class="layui-form-text">
              <div class="layui-input-block">
                <textarea name="remark" class="layui-textarea" style="min-height:0px;"></textarea>
              </div>
            </div>
            <br />
          </div>
          <div class="cart-footer">
            <!-- <a id="sbm" href="http://localhost/ionlinei.com/thong-bao.php?n=<?php //echo $tong_tien ; ?> ">Xác nhận đặt hàng</a> -->
            <button id="button" type="submit" class="layui-btn btn_vipshop layui-btn-danger">Xác nhận đặt hàng</button>
          </div>
        <!-- </form> -->
        {{ Form::close() }}
      
        <div class="timetips layui-row">
          <ul>
            <li style="text-align: center; width:100%; color: #000000">{{$config->text_footer_order}}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@include('hung.footer')
