//Khi trang web load xong thì chạy hàm này
$(document).ready(function () {
    //ẩn danh muc sản phẩm
    document.getElementById("cate-list").style.display = "none";
    //Khi hover vào danh mục sản phẩm sẽ sổ xuống 1 cái list
    $('div#cate-nav').hover(function () {
        document.getElementById("cate-list").style.display = "inline-block";
    }, function () {
        document.getElementById("cate-list").style.display = "none";
    });

    //Khi kéo màn hình lên/xuống thì chạy hàm này
    window.onscroll = function () {scrollFunction()};
    function scrollFunction(){
        //Nếu kéo màn hình cách top trên 200px
        if(document.documentElement.scrollTop >= 200){
            //Cho thanh menu dính trên top ko bị mất khi kéo xuống
            document.getElementById("navigation").style.position = "fixed";
            document.getElementById("navigation").style.width = "100%";
            //document.getElementById("navigation").style.paddingLeft = "2.3%";
            document.getElementById("navigation").style.zIndex = "99";
            document.getElementById("navigation").style.backgroundColor = "#30323A";
            //document.getElementById("navigation").style.marginLeft = "7.8%";
            document.getElementById("navigation").style.top = "0";
            //document.getElementById("nav-id").style.padding = "0 0";

        }else {
            document.getElementById("navigation").style.position = "relative";
            document.getElementById("navigation").style.width = "100%";
            document.getElementById("navigation").style.marginLeft = "0";
            //document.getElementById("nav-id").style.paddingLeft = "15px";
            //document.getElementById("cate-list").style.display = "inline-block";

        }
    }
})