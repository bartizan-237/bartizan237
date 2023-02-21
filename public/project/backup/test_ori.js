console.log("emptyave.js");

$(document).ready(function (){
    var toggle_btn_index = 0;
    $(".goods_summary .fr-view p").each(function (i, p_tag){
        if($(p_tag).text().indexOf("(+-)") != -1) {
            console.log($(p_tag).text());
            $(p_tag).attr("id", "toggle_btn_" + toggle_btn_index);
            $(p_tag).addClass("toggle_btn");
            $(p_tag).css('margin-bottom', "15px");
            toggle_btn_index++;


            var after_text = $(p_tag).text().replace("(+-)", "");
            $(p_tag).text(after_text);
            $(p_tag).append("<span class=\"toggle_btn_icon\" style='cursor:pointer; float : right; font-size: 15px; line-height: 15px; font-width: bold;'> + </span>");

            var description = $(p_tag).next().text();
            // $(p_tag).next().css("display", "none");
            $(p_tag).next().remove()
            var desc_div =
                `<div class="description_div" style="display: none">` + description + `</div>`;
            $(p_tag).after(desc_div);

        }
    });

    $(".toggle_btn").click(function (){
        var before_display = $(this).next().css("display");
        if(before_display == "none"){
            console.log("SHOW");

            $(this).find(".toggle_btn_icon").text(" - ");
            // $(this).next().css("display", "inline");
            var $description = $(this).next();
            $description.stop().animate({
                height : "toggle",
            }, 500)
        }else{
            console.log("HIDE");

            $(this).find(".toggle_btn_icon").text(" + ");
            // $(this).next().css("display", "none");
            var $description = $(this).next();
            $description.stop().animate({
                height : "toggle",
            }, 500)
        }
    });

})
