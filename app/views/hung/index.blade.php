@include('hung.header')
<div class="layui-container">
	<div class="layui-main">
		<div class="swiper-container">
			<div class="swiper-wrapper"> 
				<div class="item">
					<a class="swiper-slide" href="#">
						<img src="images/hung/images/header-1.jpg" width="100%" height=""/>
					</a>
				</div>
				<div class="item">
					<a class="swiper-slide" href="#">
						<img src="images/hung/images/header-2.jpg" width="100%" height=""/>
					</a>
				</div> 
			</div>
		</div>
		<div class="layui-product-info">
			<div class="layui-product-meta">
				<h1 class="layui-product-name">{{$config->text_header}}</h1>
				<div class="layui-product-price"> <span class="sale-price"> {{$config->sale_price_header}}</span>
					<span class="market-price"> <del>{{$config->price_header}}</del> </span>
					<span class="vip-discount"> <span>{{$config->promotion_price_header}}</span> </span> 
				</div>
			</div>
			<div class="layui-buy">
				<button class="layui-btn layui-btn-danger now_buy"><strong>{{$config->text_header_common}}</strong></button>
			</div>
			<hr>
			<div class="layui-ship layui-row">
				<div class="layui-col-xs9">{{$config->text_fee_transfer}}</div>
				<div class="layui-col-xs3">Số lượng ưu đãi:{{$config->text_promotion_number}}</div>
			</div>
		</div>
		<div class="layui-line"></div>
		<div class="layui-product-info layui-row layui-share" style="line-height: 28px;">
			<div class="layui-col-xs4"> Chia sẻ </div>
			<div class="layui-col-xs2"> <a class="layui-circle layui-inline line" href="" target="_blank"></a> </div>

			<div class="layui-col-xs2"> 
				<a class="layui-circle layui-inline facebook" href="https://www.facebook.com/sharer/sharer.php?u=http://wax.ionlinei.com&t=Wax vuốt đổi màu tóc cao cấp từ Nhật Bản&shaer=fb" target="_blank"></a>
			</div>
			<div class="layui-col-xs8 sharer_fb "> 
				<div class="fb-send" data-href="http://wax.ionlinei.com"></div>
				<div class="fb-like" data-href="http://wax.ionlinei.com" data-layout="button_count" data-action="like" data-show-faces="true"></div>
				<div class="fb-share-button" data-href="http://wax.ionlinei.com" data-layout="button_count"></div> 
			</div>
		</div>
		<div class="layui-line"></div>
		<div class="layui-product-info">

			<div class="layui-product-size">
				<!-- <div class="layui-product-size-title">
					<b>Qui cách</b> 
				</div>
				<div class="layui-product-size-list">
					<span>Đỏ</span><span>Tím</span><span>Khói</span><span>Vàng</span><span>Bạc</span>         
				</div> -->
			</div>                        
			<div class="layui-product-size">
				<!-- <div class="layui-product-size-title"> <b>Chi tiết sản phẩm</b> </div> -->
				<div class="layui-product-images/hung/images"> <img src="{{ !empty($config->image_body) ? url($config->image_body) : NO_IMG }}" alt="" /> </div>
				<div class="layui-row">
					<table class="layui-table">
						<colgroup>
							<col width="100">
							<col>
						</colgroup>
						<tbody>
							<tr>
								<td>Phương thức phát hàng</td>
								<td>{{$config->kind_pay}}</td>
							</tr>
							<tr>
								<td>Phí vận chuyển</td>
								<td>{{$config->fee_transfer}}</td>

							</tr>
							<tr>
								<td>Thời gian phát hàng</td>
								<td>{{$config->time_export}}</td>

							</tr>
							<tr>
								<td>Thời gian giao hàng</td>
								<td>{{$config->time_transfer}}</td>
							</tr>
							<tr>
								<td>Bộ phận bảo hành</td>
								<td>{{$config->quanity}}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="layui-line"></div>
		<div class="layui-product-info">
			<div class="layui-product-size">
				<div class="layui-product-size-title"> <b>Bình luận</b> </div>
				<div class="layui-comment-list" id="commentScroll" style="height: 200px;overflow: hidden;">
					<ul>
						<li>
							<div class="layui-comment">
								<div class="layui-commet-title">
									<div class="layui-product-name">
										<font color="#ff0000">Đ**</font>()
										<span style="color: #ff0000;">
											<span class="star-item">★</span>
											<span class="star-item">★</span>
											<span class="star-item">★</span>
											<span class="star-item">★</span>
											<span class="star-item">★</span>
										</span>
									</div>
								</div>
								<div class="layui-commet-info">
									<p>Màu lên rất đẹp nhé. Không dính tay, rửa cái hết ngay.</p>
									<div class="comment_picture">
										<a href="javascript:;"><img class="cpic" src="images/hung/images/anh-cm-3.jpg"></a>
										<a href="javascript:;"><img class="cpic" src="images/hung/images/anh-cm-4.jpg"></a>                 
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="layui-comment">
								<div class="layui-commet-title">
									<div class="layui-product-name">
										<font color="#ff0000">V**</font>()
										<span style="color: #ff0000;">
											<span class="star-item">★</span>
											<span class="star-item">★</span>
											<span class="star-item">★</span>
											<span class="star-item">★</span>
											<span class="star-item">★</span>
										</span>
									</div>
								</div>
								<div class="layui-commet-info">
									<p>Nhìn cũng ổn chứ</p>
									<div class="comment_picture">
										<a href="javascript:;"><img class="cpic" src="images/hung/images/anh-cm-1.jpg"></a>                  
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="layui-comment">
								<div class="layui-commet-title">
									<div class="layui-product-name">
										<font color="#ff0000">D**</font>()
										<span style="color: #ff0000;">
											<span class="star-item">★</span>
											<span class="star-item">★</span>
											<span class="star-item">★</span>
											<span class="star-item">★</span>
											<span class="star-item">★</span>
										</span>
									</div>
								</div>
								<div class="layui-commet-info">
									<p>Đập trai ^^</p>
									<div class="comment_picture">
										<a href="javascript:;"><img class="cpic" src="images/hung/images/anh-cm-2.jpg"></a>                  
									</div>
								</div>
							</div>
						</li>            
					</ul>
				</div>
				<div class="layui-btn1" style="width:100%;margin:10px 0 0;" id="appcomment">Bình luận</div>
			</div>
		</div>
		<div style="width: 100%; clear: both;position: relative;">
			<div id="apprDialog" class="layui-hide">
				<div class="layui-line"></div>
				<div class="layui-product-info layui-row">
					<div class="layui-product-size-title"> <b>Đơn hàng mới</b> </div>
					<div class="new_order">
						<div class="picMarquee-top">
							<div class="bd" id="orderScroll" style="height:200px; overflow: hidden;font-size:13px;">
								<ul class="picList">
									<li> 
										<span>B**（090***337）</span> <span style="float:right;">6phút trước</span> <br>
										<span>Wax vuốt đổi màu tóc cao cấp từ Nhật Bản</span><br>
										<span>x1</span>
									</li>
									<li>
										<span>a**（093***777）</span> <span style="float:right;">4phút trước</span> <br>
										<span>Wax vuốt đổi màu tóc cao cấp từ Nhật Bản</span><br>
										<span>x1</span>
									</li>
									<li> 
										<span>T**（090***937）</span> <span style="float:right;">7phút trước</span> <br>
										<span>Wax vuốt đổi màu tóc cao cấp từ Nhật Bản</span><br>
										<span>x1</span>
									</li>
									<li>
										<span>n**（090***930）</span> <span style="float:right;">3phút trước</span>
										<br>
										<span>Wax vuốt đổi màu tóc cao cấp từ Nhật Bản</span><br>
										<span>x1</span>
									</li>
									<li> 
										<span>T**（098***106）</span> <span style="float:right;">3phút trước</span> <br>
										<span>Wax vuốt đổi màu tóc cao cấp từ Nhật Bản</span><br>
										<span>x1</span>
									</li>
									<li> 
										<span>N**（077***958）</span> <span style="float:right;">3phút trước</span> <br>
										<span>Wax vuốt đổi màu tóc cao cấp từ Nhật Bản</span><br>
										<span>x1</span>
									</li>
									<li> 
										<span>a**（090***871）</span> <span style="float:right;">3phút trước</span> <br>
										<span>Wax vuốt đổi màu tóc cao cấp từ Nhật Bản</span><br>
										<span>x1</span>
									</li>
									<li>
										<span>a**（090***595）</span> <span style="float:right;">3phút trước</span> <br>
										<span>Wax vuốt đổi màu tóc cao cấp từ Nhật Bản</span><br>
										<span>x1</span>
									</li>
									<li> <span>H**（038***999）</span> <span style="float:right;">4phút trước</span> <br>
										<span>Wax vuốt đổi màu tóc cao cấp từ Nhật Bản</span><br>
										<span>x1</span>
									</li>
									<li> <span>H**（038***999）</span> <span style="float:right;">4phút trước</span> <br>
										<span>Wax vuốt đổi màu tóc cao cấp từ Nhật Bản</span><br>
										<span>x1</span>
									</li>                          
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="layui-footer layui-product-footer">
					<div class="layui-buy">
						<button class="layui-btn layui-btn-danger now_buy">Gía đặc biệt từ <b>250.000đ</b> </button>
					</div>
				</div>
			</div>

		</div>

		<div class="layui-product-buy layui-hide">
			<form class="layui-form" action="http://localhost/ionlinei.com/dat-hang.php" method="post">
				<div class="layui-product-title layui-row">
					<div class="layui-col-xs3 layui-image"> 
						<img src=" images/hung/images/sp-do.jpg" id="sizeimg"/> 
					</div>
					<div class="layui-col-xs8 layui-name">
						<p>Wax vuốt đổi màu tóc cao cấp từ Nhật Bản</p>
						<p>WISE50002</p>
						<p class="layui-text-red" id="sizetitle">Đỏ</p>
					</div>
					<div class="layui-col-xs1 layui-close"> <i class="fa fa-times" aria-hidden="true"></i> </div>
				</div>
				<div class="layui-product-content" id="content_1">
					<div class="layui-product-info" style="border-bottom:1px solid #dcdcdc;">
						<div class="layui-product-size">
							<div class="layui-product-size-title">
								<b>Qui cách</b>
							</div>
							<div class="layui-product-size-list layui-row layui-col-space5" id="sizeselect">
								<div class="layui-size layui-col-xs3 active" data-field="Đỏ" data-price="250000" data-img="images/hung/images/sp-do.jpg">
									<div class="layui-elip"><img src="images/hung/images/sp-do.jpg" width="100%"> 
									</div>
								</div>
								<div class="layui-size layui-col-xs3 " data-field="Tím" data-price="250000" data-img="images/hung/images/sp-tim.jpg">
									<div class="layui-elip">
										<img src="images/hung/images/sp-tim.jpg" width="100%"> 
									</div>
								</div><div class="layui-size layui-col-xs3 " data-field="Khói" data-price="250000" data-img="images/hung/images/sp-khoi.jpg">
									<div class="layui-elip">
										<img src="images/hung/images/sp-khoi.jpg" width="100%"> 
									</div>
								</div>
								<div class="layui-size layui-col-xs3 " data-field="Vàng" data-price="250000" data-img="images/hung/images/sp-vang.jpg">
									<div class="layui-elip">
										<img src="images/hung/images/sp-vang.jpg" width="100%"> 
									</div>
								</div>
								<div class="layui-size layui-col-xs3 " data-field="Bạc" data-price="250000" data-img="images/hung/images/sp-bac.jpg">
									<div class="layui-elip">
										<img src="images/hung/images/sp-bac.jpg" width="100%">
									</div>
								</div>           
							</div>
						</div>                             
					</div>
					<div class="layui-product-info">
						<div class="layui-product-size-title"> <b>Số lượng</b> </div>
						<div class="layui-product-num">
							<button type="button" class="decrease">-</button>
							<input type="text" name="number" maxlength="2" class="layui-input" value="1" readonly>
							<button type="button" class="increase">+</button>
						</div>
					</div>
				</div>
				<div id="input-hidden">
					<input id="color" type="hidden" name="size1" value="Đỏ">
					<input type="hidden" name="price" value="250000">
				</div>
				<div class="layui-buy-footer layui-row">
					<div class="col-6" id="pri-num"><span>250000</span>VNĐ<em><s></s></em></div>
					<div class="col-6" id="buy">
						<input type="submit" value="Bước tiếp theo" lay-filter="nowBuy" lay-submit style="font-size: 16px;">
						<!-- <a id="sba" href="http://localhost/ionlinei.com/dat-hang.php?n=<?php //echo 8 ;?>& color= <?php //echo 'xanh' ; ?> ">Bước tiếp theo</a> -->
					</div>
				</div>
			</form>
		</div>
		<div class="hbg"></div>

		<div id="totop">

			<div id="fb-root"></div>
			<script async defer src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2"></script>
		</div>
	</div>

@include('hung.footer')



	