$(document).ready(function () {

    var lastScrollTop = 0;
    document.addEventListener("scroll", function() {

        var st = window.pageYOffset || document.documentElement.scrollTop;
        if (st > lastScrollTop) {

            var tst = $(window).scrollTop();
            var dd = $(document).height()*0.6667;

            if (tst > dd) {

                return ajaxs({url:'game/get_cards', method:'get', types:'json', data:{}},function(data, status) {
                        "use strict";
                    var htmls = '';
                    $.each(data.cards, function(inx, vals){
                        "use strict";

                        htmls += '<a href = "game/cards/'+vals.cards.id+'">';
                        htmls += '<div class = "col-xs-6 col-sm-4 col-lg-3">';
                        htmls += '<div class = "thumbnail">';
                        htmls += '<img src = "/image/'+vals.cards[0].card_descr.img+'">';
                        htmls += '<div class = "caption">';
                        htmls += '<h5>Title</h5>';
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

                    $('<div class="row">'+htmls+'</div>').appendTo('.load-more-block');

                })
            }
        }
        lastScrollTop = st;
    }, false);
});

function ajaxs(objs, callback) {
    "use strict";
    $.ajax({
        url:objs.url,
        method:objs.method,
        dataType:objs.types,
        timeout:3000,
        data:objs.data,
        success : function (data, status) {
            return callback(data, status);
        }
    });
}
