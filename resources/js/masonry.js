// $('.grid').masonry({
//     // options...
//     itemSelector: '.grid-item',
//     columnWidth: 200
// });
imagesLoaded( document.querySelector('.grid'), function( instance ) {
    console.log('all images are loaded');

    var grid = document.querySelector('.grid');
    var msnry = new Masonry( grid, {
        // options...
        itemSelector: '.grid-item',
        columnWidth: 220,

    });

    // init with selector
    var msnry = new Masonry( '.grid', {
        // options...
        // gutter: 5
    });
});
window.onload = function() {
    if (window.jQuery) {
        // jQuery is loaded

        //Titles
        var lastMouseX,
            lastMouseY;

        $(window).on("mousemove", function (e) {
            lastMouseX = e.pageX;
            lastMouseY = e.pageY;
        });

        $(".fancybox").fancybox({
            helpers: {
                title: {
                    type: 'over'
                }
            },
            afterShow: function () {
                $(".fancybox-wrap").hover(function () {
                    $(".fancybox-title").stop(true, true).slideDown(200);

                }, function () {
                    $(".fancybox-title").stop(true, true).slideUp(200);
                });

                var fancyBoxWrap = $(".fancybox-wrap");
                var divTop = fancyBoxWrap.offset().top;
                var divLeft = fancyBoxWrap.offset().left;
                var divRight = divLeft + fancyBoxWrap.width();
                var divBottom = divTop + fancyBoxWrap.height();

                var currentlyHovering = lastMouseX >= divLeft && lastMouseX <= divRight && lastMouseY >= divTop && lastMouseY <= divBottom;
                if (currentlyHovering) {
                    $(".fancybox-title").stop(true, true).slideDown(200);
                } else {
                    $(".fancybox-title").hide();
                }
            }
        });

                // $(".grid-item").hover(function() {
                //     $(".fancybox-title").show();
                // }, function() {
                //     $(".fancybox-title").hide();
                // });

    } else {
        // jQuery is not loaded
        alert("Doesn't Work");
    }
}
