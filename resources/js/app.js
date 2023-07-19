require('./bootstrap');

console.log("APP.JS");

window.toast = function (type, string) {
    console.log("TOAST ", string, type);
    var toast = document.getElementById("toast");

    if(type === "success"){
        var bg_color = "rgba(21,128,61,0.7)"
    }else if(type === "warning"){
        var bg_color = "rgba(239,68,68,0.7)"
    }else {
        var bg_color = "rgba(38, 45, 57, 0.88)"
    }

    toast.classList.contains("reveal") ?
        (clearTimeout(removeToast), removeToast = setTimeout(function () {
            document.getElementById("toast").classList.remove("reveal")
        }, 2500)) :
        removeToast = setTimeout(function () {
            document.getElementById("toast").classList.remove("reveal")
        }, 2500)

    toast.classList.add("reveal"),
        toast.children[0].innerHTML = string,
        toast.style.backgroundColor = bg_color
}


window.openModal = function (image_url) {
    console.log("openModal", image_url);
    var modal = document.getElementById("modal_bg");
    modal.classList.remove("hidden");

    var modal_img = document.getElementById("modal_img");
    modal_img.src = image_url;
}

window.closeModal = function () {
    console.log("closeModal");
    var modal = document.getElementById("modal_bg");
    modal.classList.add("hidden");

    var modal_img = document.getElementById("modal_img");
    modal_img.src = "";
}
