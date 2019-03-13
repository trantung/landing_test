@include('hung.header')
<div class="layui-container">
	<div class="layui-main">
		<div class="swiper-container">
			<div class="swiper-wrapper"> 
				@foreach($slides as $slide) 
				<div class="item">
					<a class="swiper-slide" href="#">
						<img src="{{ $slide->image_url }}" width="100%" height=""/>
					</a>
				</div>
				@endforeach
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
				<div class="layui-col-xs9">{{$config->text_fee_transfer}}</div>
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
				<div class="fb-like" data-href="https://www.facebook.com/Vinstores/" data-layout="button_count" data-action="like" data-show-faces="true"></div>
				<div class="fb-share-button" data-href="https://www.facebook.com/Vinstores/" data-layout="button_count"></div> 
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
						<a href="https://www.facebook.com/Vinstores/"><span class="layui-right" style="margin-right: 2%;">{{$config->text_footer_left}}</span></a>
						<spam class="layui-right"><button class="layui-btn layui-btn-danger now_buy layui-btn2">{{$config->text_footer_right}}</button></spam>
					</div>
				</div>
			</div>

		</div>

		<div class="layui-product-buy layui-hide">
			<!-- <form class="layui-form" action="http://localhost/ionlinei.com/dat-hang.php" method="post"> -->
				{{ Form::open(array('action' => array('OrderController@store'), 'method' => "POST", 'class' => 'layui-form')) }}
				<div class="layui-product-title layui-row">
					@if($productFirst)
					<div class="layui-col-xs3 layui-image"> 
						<img src="{{ $productFirst->image_url}}" id="sizeimg"/>
					</div>
					<div class="layui-col-xs8 layui-name">
						<p id="product_name">{{$productFirst->text}}</p>
						<p id="product_color">{{$productFirst->code}}</p>
						<p class="layui-text-red" id="sizetitle">{{$productFirst->color}}</p>
					</div>
					@endif
					<div class="layui-col-xs1 layui-close"> <i class="fa fa-times" aria-hidden="true"></i> </div>
				</div>

				<div class="layui-product-content" id="content_1">
					<div class="layui-product-info" style="border-bottom:1px solid #dcdcdc;">
						<div class="layui-product-size">
							<div class="layui-product-size-title">
								<b>Qui cách</b>
							</div>
							<div class="layui-product-size-list layui-row layui-col-space5" id="sizeselect">
								@foreach($products as $product)
								<div class="layui-size layui-col-xs3 active choose" data-field="{{$product->color}}" data-price="{{$product->price}}" data-product-name="{{$product->text}}" data-product-code="{{$product->code}}" data-img="{{ $product->image_url}}">
									<div class="layui-elip" onclick="chooseProduct({{$product->id}})"><img src="{{ $product->image_url}}" width="100%"> 
									</div>
								</div>
								@endforeach
								 

							</div>
						</div>                             
					</div>
					<div class="layui-product-info">
						<div class="layui-product-size-title"> <b>Số lượng</b> </div>
						<div class="layui-product-num">
							<button type="button" class="decrease">-</button>
							<input id = "number_default" type="text" name="number" maxlength="2" class="layui-input" value="1" readonly>
							<button type="button" class="increase">+</button>
						</div>
					</div>
				</div>

				<div id="input-hidden" class="choose-product">
				</div>
				<div class="layui-buy-footer layui-row">
					<div class="col-6" id="pri-num" style="margin-right: 4px;"><span>{{$productFirst->price}}</span>VNĐ
					</div>
					<div id="remove_product">
					<input type="hidden" id="price_first" name="price_first" value="{{$productFirst->price}}">
					</div>
					<div class="col-6 mobile_hihe remove_a" style="margin-right: 4px;"><a href="https://www.facebook.com/Vinstores/">{{$config->text_footer_left}}</a> </div>
					<div class="col-6" id="buy">
						<input type="submit" value="Bước tiếp theo" lay-filter="nowBuy" lay-submit style="font-size: 15px;">
						
					</div>
				</div>
			{{Form::close()}}
		</div>
		<div class="hbg"></div>

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

@include('hung.footer')


	