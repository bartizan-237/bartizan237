console.log("22.4.2. KMONG : WEBAPPDEV");


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

setTimeout(function (){
    $(".owl-stage .owl-item").each(function (idx, item){
        var item_product_name = $(item).find('.item-detail').find('.item-pay').find('h2').text();
        // console.log("item_product_name", item_product_name);
        if(item_product_name.includes("/") != -1){
            console.log("Divide Item Prod Name", item_product_name);
            var new_product_name = item_product_name.replace("/", "<br/>");
            var new_product_name_span = '<span>' + new_product_name + '</span>';
            $(item).find('.item-detail').find('.item-pay').find('h2').html(new_product_name_span);

        }
    });

}, 500);


