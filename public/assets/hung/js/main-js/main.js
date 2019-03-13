
$(document).ready(function () {
    owlBanner();
    function owlBanner() {
        if ($('.swiper-wrapper .item').length > 0) {
            $('.swiper-wrapper').owlCarousel({
                loop: false,
                autoplay: false,
                margin: 0,
                slideSpeed: 1000,
                nav: true,
                dots: true,
                fluidSpeed: true,
                items: 1,
                navText:['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            });
        }
    }
    $('.owl-dot').each(function(){
        $(this).children('span').text($(this).index()+1);
    });


    // hết js slider 
    var boxer = $('#commentScroll,#orderScroll'); 
    // hiêu ứng chạy
    boxer.map(function(index, dom){
        var list = $(dom).children().eq(0);
        var clone = list.clone();
        $(dom).append(clone);
        var speed = 100;
        function Marquee(){
            if( $(dom).scrollTop() - list.height() >= 4 ){
                $(dom).scrollTop(0);
            }else{
                $(dom).scrollTop($(dom).scrollTop()+1);
            }
        }
        setInterval(Marquee,speed);
    });
// click hiện  chọn sản phẩm số lượng 

    $('.layui-btn2').click(function(){
        $('.layui-product-buy').removeClass('layui-hide');
        $('body').addClass('buy-active');

    })
    $('.layui-close').click(function(){
            $('.layui-product-buy').addClass('layui-hide');
            $('body').removeClass('buy-active');

        })
    $('.hbg').click(function () {
        $('body').removeClass('buy-active');
        $('.layui-product-buy').addClass('layui-hide');
        $('#apprDialog').addClass('layui-hide');
    });

    var fnum = $('input[name=number]').val();
    $("#sizeselect > div").each(function(data){
                $(this).bind("click",function (){
                    $(this).addClass('active').siblings().removeClass("active");
                    var id=$(this).attr('data-field');
                    var tprice=$(this).attr('data-price');

                    var tname_product=$(this).attr('data-product-name');
                    var tcode_product=$(this).attr('data-product-code');

                    var img=$(this).attr('data-img');
                    $('input[name=size1]').val(id);
                    $('input[name=price]').val(tprice);
                    // $('input[name=price]').val(tname_product);
                    // $('input[name=price]').val(tcode_product);

                    $('#sizeimg').attr('src',img);
                    $('#sizetitle').html(id);
                    $('#product_name').html(tname_product);
                    $('#product_color').html(tcode_product);
                    // $('#pri-num span').html(Math.abs(parseInt(tprice))*fnum);  
                    // console.log(html_price); 
                    var html_price = '<span>' + Math.abs(parseInt(tprice))*fnum + '</span>VNĐ';
                    $('#pri-num').html(html_price);                
                })
            });
            $("#size2select > div").each(function(data){
                $(this).bind("click",function (){
                    $(this).addClass('active').siblings().removeClass("active");
                    var id=$(this).attr('data-field');
                    $('input[name=size2]').val(id);
                })
            });
            $('.decrease').click(function () {
                if (Math.abs(parseInt(fnum)) <= 1){
                    $('input[name=number]').val(1);
                }else{
                    fnum = Math.abs(parseInt(fnum)) - 1;
                    // price = $('input[name=price]').val();
                    typeof value === "undefined"
                    if (typeof $('input[name=price]').val() === "undefined") {
                        price = $('input[name=price_first]').val();
                    } else{
                        price = $('input[name=price]').val();
                    }
                    $('input[name=number]').val(fnum);
                    // $('#pri-num span').html(Math.abs(parseInt(price))*fnum);
                    var html_price = '<span>' + Math.abs(parseInt(price))*fnum + '</span>VNĐ';
                    $('#pri-num').html(html_price);
                                    
                }
            });
            $('.increase').click(function () {
                if (Math.abs(parseInt(fnum)) < 1){
                    $('input[name=number]').val(1);
                }else{
                    fnum = Math.abs(parseInt(fnum)) + 1;
                    if (typeof $('input[name=price]').val()) {
                        price = $('input[name=price_first]').val();
                    } else{
                        price = $('input[name=price]').val();
                    }
                    // price = $(this).attr('data-price');
                    console.log(price);
                    $('input[name=number]').val(fnum);
                    // $('#pri-num span').html(Math.abs(parseInt(price))*fnum);
                    var html_price = '<span>' + Math.abs(parseInt(price))*fnum + '</span>VNĐ';
                    $('#pri-num').html(html_price);             
                }
            });

    $(".cpic").click(function(){
        layer.open({
            type: 1,
            title: false,
            closeBtn: 1,
            area: ['auto', 'auto'],
                        skin: 'layui-layer-nobg',
                        shadeClose: true,
                        content: '<img src="'+$(this).attr('src')+'" style="height:500px;“>'
                    });
    });



// validate form
        $("#button").click(function(){
          var name = $('input[name=name]').val();
          var mobile = $('input[name=mobile]').val();
          var detailed = $('input[name=detailed]').val();
          if (name == "") {
            alert('Vui lòng điền họ tên');
            $('input[name=name]').focus();
            return false
          }
          if (mobile == "") {
            alert('Vui lòng điền số điện thoại');
            $('input[name=mobile]').focus();
            return false
          }
          if (detailed == "") {
            alert('Vui lòng điền địa chỉ cụ thể');
            $('input[name=detailed]').focus();
            return false
          }
          $('form').submit();

        });
        
        $("#province").hide();
        // nut tôtpop
         $(function() {
            $(window).scroll(function() {
                if($(this).scrollTop() != 0) {
                    $('#toTop').fadeIn();  
                } else {
                    $('#toTop').fadeOut();
                }
            });
       
            $('#toTop').click(function() {
                $('body,html').animate({scrollTop:0},800);
            });  
        });

});