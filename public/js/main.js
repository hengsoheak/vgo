$(document).ready(function () {

    var lastScrollTop = 0;
    document.addEventListener("scroll", function () {

        var st = window.pageYOffset || document.documentElement.scrollTop;
        if (st > lastScrollTop) {

            var tst = $(window).scrollTop();
            var dd = $(document).height() * 0.6667;
            if (tst > dd) {

                return ajaxs({url: 'game/get_cards', method: 'get', types: 'json', data: {}}, function (data, status) {
                    "use strict";
                    var htmls = '';
                    $.each(data.cards_type, function (inx, vals) {
                        "use strict";

                        if (!$.isEmptyObject(vals.card_type_description) && vals.card_type_description.length != 0) {

                            htmls += generateCate(vals);

                        }
                    });
                    $(htmls).appendTo('#card_result');
                })
            }
        }
        lastScrollTop = st;
    }, false);
});
function generateCate(data) {


    var htmls = '';

    htmls += ' <div class = "panel panel-default">';
    htmls += ' <ul class = "breadcrumb">';
    htmls += ' <li class = "completed"><a href = "javascript:void(0);"> ' + data.card_type_description[0].title + ' </a></li>';
    htmls += ' </ul>';
    htmls += ' <div class = "panel-body">';
    htmls += GenerateHtmls(data);
    htmls += ' </div>';
    htmls += ' <hr/>';
    htmls += ' <div class = "load-more-block"></div>';
    htmls += ' </div>';
    return htmls;
}


function GenerateHtmls(data) {

    var htmls = '';
    if (!$.isEmptyObject(data.cards)) {

        $.each(data.cards, function (inx, vals) {
            $.each(vals.card_descr, function (inxs, description) {

                htmls += '<a href = "game/cards/' + vals.id + '">';
                htmls += '<div class = "col-xs-6 col-sm-4 col-lg-3">';
                htmls += '<div class = "thumbnail">';
                htmls += '<img src = "/image/' + description.img + '">';
                htmls += '<div class = "caption">';
                htmls += '<h5>' + description.title + '</h5>';
                htmls += '<p class = "flex-text text-muted">';
                htmls += 'Lorem ipsum dolor sit amet, consectetur </p>';
                htmls += '<a class = "btn btn-primary btn-xs" href = "#">Link</a>';
                htmls += '<a class = "btn btn-primary btn-xs" href = "#">Link</a>';
                htmls += '<a class = "btn btn-primary btn-xs" href = "#">Link</a>';
                htmls += '<a class = "btn btn-primary btn-xs" href = "#">Link</a>';
                htmls += '</div>';
                htmls += '</div>';
                htmls += '</div>';
                htmls += '</a>';

            });
        });
    }

    return htmls;

}
function ajaxs(objs, callback) {
    "use strict";
    $.ajax({
        url: objs.url,
        method: objs.method,
        dataType: objs.types,
        timeout: 3000,
        data: objs.data,
        success: function (data, status) {
            return callback(data, status);
        }
    });
}
