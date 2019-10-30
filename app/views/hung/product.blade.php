@include('hung.header')

<div class="layui-product-buy">
    {{ Form::open(array('action' => array('OrderController@store'), 'method' => "POST", 'class' => 'layui-form')) }}
    <div class="layui-product-title layui-row">
        @if($productFirst)
        <div class="layui-col-xs3 layui-image"> 
            <img src="{{ $productFirst->image_url}}" id="sizeimg"/>
        </div>
        <div class="layui-col-xs9 layui-name">
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
    <input type="hidden" name="product_id_first" value="{{$productFirst->id}}">

    <div class="layui-buy-footer layui-row">
        <div class="col-6" id="pri-num" style="margin-right: 4px;"><span>{{$productFirst->price}}</span>VNĐ
        </div>
        <div id="remove_product">
        <input type="hidden" id="price_first" name="price_first" value="{{$productFirst->price}}">
        </div>
        <div class="col-6 mobile_hihe remove_a" style="margin-right: 4px;"><a href="{{$config->message_to}}">{{$config->text_footer_left}}</a> </div>
        <div class="col-6" id="buy">
            <input type="submit" value="Bước tiếp theo" lay-filter="nowBuy" lay-submit style="font-size: 15px;">
            
        </div>
    </div>
    {{Form::close()}}
</div>
<div class="hbg"></div>

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
