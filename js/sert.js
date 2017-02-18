$(document).ready(function(){
    $('.main .slider').lightSlider({
        item:2,
        autoWidth:true,
        loop:true,
        pause:5000,
        enableDrag: true,
        auto: true,
        currentPagerPosition:'left',
        onSliderLoad: function(el) {
            $('.main .slider li').show();
            el.lightGallery({
                selector: '.main .slider .lslide',
                zoom: false
            });
        }
    });

    $('#sert').lightGallery({
        zoom: true,
        thumbnail:false
    });
});