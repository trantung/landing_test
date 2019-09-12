include('hung.header')
<div class="layui-container">
	<div class="layui-main">
		<div class="swiper-container">
			<div class="swiper-wrapper"> 
				<iframe width="100%" height="" src="https://www.youtube.com/embed/BIr9wlVnoFY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
				<span class="layui-right layui-btn2" style="margin-right: 2%;">{{$config->text_header_common}}</span>
				<spam class="layui-right"><button class="layui-btn layui-btn-danger now_buy">{{$config->text_number_sale_off}}: {{$config->text_promotion_number}}</button></spam>
			</div>
			<hr>
			<div class="layui-ship layui-row">
				<div class="layui-col">{{$config->text_fee_transfer}}</div>
			</div>
		</div>
		<div class="layui-line"></div>
		<div class="layui-product-info layui-row layui-share" style="line-height: 28px;">
			<div class="layui-col-xs4"> Chia sẻ </div>
			<div class="layui-col-xs2"> <a class="layui-circle layui-inline line" href="" target="_blank"></a> </div>

			<div class="layui-col-xs2"> 
				<a class="layui-circle layui-inline facebook" href="https://www.facebook.com/sharer/sharer.php?u=https://www.facebook.com/Vinstores/&t=Wax vuốt đổi màu tóc cao cấp từ Nhật Bản&shaer=fb" target="_blank"></a>
			</div>
			<div class="layui-col-xs8 sharer_fb "> 
				<div class="fb-send" data-href="https://www.facebook.com/Vinstores/"></div>
				<div class="fb-like" data-href="{{$config->like_link}}" data-layout="button_count" data-action="like" data-show-faces="true"></div>
				<div class="fb-share-button" data-href="{{$config->share_link}}" data-layout="button_count"></div> 
			</div>
		</div>
		<div class="layui-line"></div>
		<div class="layui-product-info">

			<div class="layui-product-size">
				<div class="layui-product-images"> <img src="{{ !empty($config->image_body) ? url($config->image_body) : NO_IMG }}" alt="" /> </div>
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
						@foreach($comments as $comment)
						<li>
							<div class="layui-comment">
								<div class="layui-commet-title">
									<div class="layui-product-name">
										<font color="#ff0000">{{$comment->name}}</font>()
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
									<p>{{$comment->comment}}</p>
									<div class="comment_picture">
										<a href="javascript:;"><img class="cpic" src="{{$comment->image_url}}"></a>
										                
									</div>
								</div>
							</div>
						</li>
						@endforeach           
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
									@foreach($commentOrders as $commentOrder)
									<li> 
										<span>{{$commentOrder->name}}）</span> <span style="float:right;">{{$commentOrder->time}}</span> <br>
										<span>{{$commentOrder->comment}}</span><br>
										<span>x{{$commentOrder->status}}</span>
									</li>
									@endforeach                         
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="layui-footer layui-product-footer">
					<div class="layui-buy">
						<a href="{{$config->message_to}}"><span class="layui-right" style="margin-right: 2%;">{{$config->text_footer_left}}</span></a>
						<spam class="layui-right"><a href="{{ action('LandingController@getBuy') }}" class="layui-btn layui-btn-danger layui-btn2", style="text-decoration:none">{{$config->text_footer_right}}</a></spam>
					</div>
				</div>
			</div>

		</div>

		<div id="totop">

			<div id="fb-root"></div>
			<script async defer src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2"></script>
		</div>
	</div>
	<script type="text/javascript">
		function chooseProduct(product_id)
		{
			$.ajax({
		        url: "/ajax/product",
		        type: "post",
		        data: {
		        	product_id : product_id
		        } ,
		        success: function (data) {
		        	console.log(data);
		        	$('#remove_product').remove();
		        	// $('#number_default').remove();
		        	// $('#number_default').val() = 1;
		        	// $('input[name="number"]').val(1);
		           var text = '<input id="price" type="hidden" name="price" value="'+data['price']+'">' + '<input id="color" type="hidden" name="product_id" value="'+product_id+'">'+
		           '<input type="hidden" id="price_first" name="price_first" value="'+data['price']+'">'
		           ;
					$('#input-hidden').html(text);               

		        },
		        error: function(jqXHR, textStatus, errorThrown) {
		           console.log(textStatus, errorThrown);
		        }
		    });
		}

	</script>
	<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '192099611408702'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=192099611408702&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
@include('hung.footer')


	
