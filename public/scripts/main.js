"use strict";
function buttonSearchPage() {
    var s = $(".searchbar-input-page").val();
    0 !== (s = $.trim(s).length) ? $(".searchbar-icon-page").css("display", "block") : ($(".searchbar-input-page").val(""), $(".searchbar-icon-page").css("display", "block"));
}
$(document).ready(function () {
    var a = $(".searchbar-icon-page"),
        b = $(".searchbar-input-page"),
        c = $(".searchbar-page"),
        d = !1;
    a.click(function () {
        d = 0 == d ? (c.addClass("searchbar-open-page"), b.focus(), !0) : (c.removeClass("searchbar-open-page"), b.focusout(), !1);
    }),
        a.mouseup(function () {
            return !1;
        }),
        c.mouseup(function () {
            return !1;
        }),
        $(document).mouseup(function () {
            1 == d && ($(".searchbar-icon-page").css("display", "block"), a.click());
        })
});

function buttonUp() {
    var s = $(".searchbar-input").val();
    0 !== (s = $.trim(s).length) ? $(".searchbar-icon").css("display", "none") : ($(".searchbar-input").val(""), $(".searchbar-icon").css("display", "block"));
}
$(document).ready(function () {
    var s = $(".searchbar-icon"),
        e = $(".searchbar-input"),
        i = $(".searchbar"),
        o = !1;
    s.click(function () {
        o = 0 == o ? (i.addClass("searchbar-open"), e.focus(), !0) : (i.removeClass("searchbar-open"), e.focusout(), !1);
    }),
        s.mouseup(function () {
            return !1;
        }),
        i.mouseup(function () {
            return !1;
        }),
        $(document).mouseup(function () {
            1 == o && ($(".searchbar-icon").css("display", "block"), s.click());
        }),
        $(".modal").on("hidden.bs.modal", function (s) {
            $(".modal:visible").length && $("body").addClass("modal-open");
        }),
        $(".dropdown-toggle").dropdown(),
        $(".multiple-items").slick({
            infinite: !0,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
                { breakpoint: 786, settings: { slidesToShow: 2, slidesToScroll: 1 } },
                { breakpoint: 568, settings: { slidesToShow: 1, slidesToScroll: 1 } },
            ],
        }),
        $(".multiple-items-1").slick({ infinite: !0, adaptiveHeight: !0, slidesToShow: 1, slidesToScroll: 1, arrows: !1, dots: !0 }),
        $(".multiple-items-2").slick({ infinite: true, slidesToShow: 3, slidesToScroll: 1, autoplay: true, autoplaySpeed: 1500, arrows: false, responsive: [{ breakpoint: 480, settings: { arrows: !1, autoplay: true, autoplaySpeed: 1500, } }] }),
        $(".collapse.show").each(function () {
            $(this).prev(".card-header").find(".svg-inline--fa").addClass("fa-minus-circle").removeClass("fa-plus-circle");
        }),
        $(".collapse")
            .on("show.bs.collapse", function () {
                $(this).prev(".card-header").find(".svg-inline--fa").removeClass("fa-plus-circle").addClass("fa-minus-circle");
            })
            .on("hide.bs.collapse", function () {
                $(this).prev(".card-header").find(".svg-inline--fa").removeClass("fa-minus-circle").addClass("fa-plus-circle");
            });
});
$(document).ready(function () {
    var getSearch = new URL(location.href).searchParams.get('search');
    var withSearch = window.location.href.split("&");
    $("#populer").click(function(){
        if(getSearch == null){
            location.href=window.location.pathname+'?filter=populer';
            $(this).addClass("active");
        }else if(getSearch != null){
            location.href=withSearch[0]+'&filter=populer';
        }
    })

    $("#terbaru").click(function(){
        if(getSearch == null){
            location.href=window.location.pathname+'?filter=terbaru';
            $(this).addClass("active");
        }else if(getSearch != null){
            location.href=withSearch[0]+'&filter=terbaru';
        }
    })

    $("#terlaris").click(function(){
        if(getSearch == null){
            location.href=window.location.pathname+'?filter=terlaris';
            $(this).addClass("active");
        }else if(getSearch != null){
            location.href=withSearch[0]+'&filter=terlaris';
        }
    })

    $("#termurah").click(function(){
        if(getSearch == null){
            location.href=window.location.pathname+'?filter=termurah';
            $(this).addClass("active");
        }else if(getSearch != null){
            location.href=withSearch[0]+'&filter=termurah';
        }
    })

    $("#termahal").click(function(){
        if(getSearch == null){
            location.href=window.location.pathname+'?filter=termahal';
            $(this).addClass("active");
        }else if(getSearch != null){
            location.href=withSearch[0]+'&filter=termahal';
        }
    })

    $("#module-ebook").click(function(){
            location.href='?category=module-ebook';
    })
    
    $("#module-video").click(function(){
        location.href='?category=module-video';
    })
    
})