//作品页面js
$(function () {
    //收藏    
    $("#shou").click(function () {
        $.ajax({
            url: "/stow.php",
            type: "post",
            data: 'dopost=stow&bid=' + $("#bid").val()+'&title='+$("#bookname").val(),
            success: function (data) {
                if (data == "-1") {
                    location.href = "/login.php";
                } else if (data == "-2") {
                    $(".top-alert").html("<div class=\"alert alert-error\">该书您已收藏！</div>");
                } else if (data == "1") {
                    $("#genduid").html(parseInt($("#genduid").html()) + 1);
                    $(".top-alert").html("<div class=\"alert alert-error\">成功收藏该书！</div>");
                } else {
                    $(".top-alert").html("<div class=\"alert alert-error\">网络不好，待会再收藏哦！</div>");
                }
            }
        });
    });
    yangshi();
});
function setFontsize(o) {
    var sizes = Number($.cookie("fontsize")) + o;
    if (sizes >= 14 && sizes <= 20) {
        $("#zcontent p").css("font-size", sizes);
        styles(sizes);
        $.cookie("fontsize", sizes, { expires: 7, path: '/' });
    }
}
function yangshi() {
    if ($.cookie("fontsize")) {
        var sizes = Number($.cookie("fontsize"));
        $("#zcontent p").css("font-size", sizes);
        styles(sizes);
    } else {
        $.cookie("fontsize", 16, { expires: 7, path: '/' });
    }
    $(".yingcang").css("display", "block");
}
function styles(sizes) {
    if (sizes == 14) {
        $("#zcontent p").css("line-height", "23px");
    }
    if (sizes == 16) {
        $("#zcontent p").css("line-height", "25px");
    }
    if (sizes == 18) {
        $("#zcontent p").css("line-height", "27px");
    }
    if (sizes == 20) {
        $("#zcontent p").css("line-height", "29px");
    }
}



