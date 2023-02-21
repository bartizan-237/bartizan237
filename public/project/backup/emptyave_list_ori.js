console.log("123");

$(document).ready(function (){
    // var product_names = $(".shop-item .item-detail .item-pay h2 a");
    // $.each(product_names, function (idx, product_name){
    //     var before_product_name = $(product_name).text();
    //     if(before_product_name.includes("/") != -1) {
    //         var new_product_name = before_product_name.replace("/", "<br/>");
    //         $(this).html(new_product_name);
    //     }
    // })

    setTimeout(function (){
        var owl_product_names = $(".owl-stage .owl-item .shop-item .item-detail a .item-pay h2");
        $.each(owl_product_names, function (idx, owl_product_name){
            var before_product_name = $(owl_product_name).text();
            if(before_product_name.includes("/") != -1) {
                var new_product_name = before_product_name.replace("/", "<br/>");
                $(this).html(new_product_name);
            }
        })
    }, 1000)

})
