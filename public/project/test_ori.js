console.log("emptyave2.js");
//
$(document).ready(function () {
    if(!IS_MOBILE || window.innerWidth >= 769) {

        if(window.innerWidth <= 991){
            $(".goods_form").css("padding-left", "0px");
        }

        $(".shop_goods_img li").css("width", "20%");
        $(".shop_goods_img li a").css("width", "100%");

        var sub_image_width;
        setTimeout(function () {
            sub_image_width = $(".shop_goods_img li a:first").width();
            console.log("sub_image_width", sub_image_width);
            $(".shop_goods_img li a").css("height", sub_image_width + "px");


            var prev_btn =
                `<span id="slick_prev_btn" style="z-index: 99; padding : 10px; position: absolute; top:` + (sub_image_width / 2 - 20) + `px; left : -45px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </span>`;

            var next_btn =
                `<span id="slick_next_btn" style="z-index: 99; padding : 10px; position: absolute; top:` + (sub_image_width / 2 - 20) + `px; right : -45px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </span>`;

            $(".shop_goods_img .slick-prev").css("display", "none");
            $(".shop_goods_img .slick-next").css("display", "none");

            $(".shop_goods_img").css("position", "relative");
            $(".shop_goods_img").prepend(prev_btn);
            $(".shop_goods_img").append(next_btn);

            $("#slick_prev_btn").click(function () {
                console.log("SLICK PREV");
                $(".shop_goods_img ul").css("padding", "10px 0px 0px 0px");
                $(".owl-item").css("padding-right", "8px");
                $(".shop_goods_img .slick-prev").trigger("click");
            });
            $("#slick_next_btn").click(function () {
                console.log("SLICK NEXT");
                $(".shop_goods_img ul").css("padding", "10px 0px 0px 0px");
                $(".owl-item").css("padding-right", "8px");
                $(".shop_goods_img .slick-next").trigger("click");
            });

            $(".shop_goods_img ul li").css("padding-right", "10px");
            $(".shop_goods_img ul").css("padding", "10px 10px 0px 0px");
            $(".owl-item").css("margin-top", "10px");
            $(".owl-item").css("padding-right", "10px");

        }, 500);


        $('.shop_goods_img ul').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 3000,
        });
    }

    // COMMON
    var product_name = $(".goods_form .view_tit").text();
    if(product_name.includes("/") != -1){
        console.log("Divide", product_name);

        if( $(".goods_form .view_tit .sold_out").length > 0){
            // SOLD OUT
            var sold_out_div = $(".goods_form .view_tit .sold_out");
            var sold_out_wrapper = $(sold_out_div).parent();

            var new_product_name = $.trim( product_name.replace("SOLDOUT", "") );
            new_product_name = new_product_name.replace("/", "<br/>");
            var new_product_name_span = '<span>' + new_product_name + '</span>';
            $(".goods_form .view_tit").html(new_product_name_span);
            $(".goods_form .view_tit").append(sold_out_wrapper);
            console.log("new_product_name_span", new_product_name_span);
        }else{
            var new_product_name = $.trim( product_name.replace("/", "<br/>") );
            var new_product_name_span = '<span>' + new_product_name + '</span>';
            console.log("new_product_name_span", new_product_name_span);
            $(".goods_form .view_tit").html(new_product_name_span);
        }

    }

    if($(".goods_form .sold_out").length > 0){
        // SOLD OUT
        var sold_out_div = $(".goods_form .sold_out:first");
        var sold_out_wrapper = $(sold_out_div).parent();
        $(sold_out_wrapper).css({
            float : "right",
            marginTop : "10px",
            marginBottom : "10x",
        })
    }




});
