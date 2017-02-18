$(document).ready(function () {
    timer();

    createStars();
    $(window).resize(function(){
        $('header .star').remove();
        createStars();
    });
});

function createStar(isMeteor){
    var left = $('header').width()*Math.random();
    var top = isMeteor ? 0 : $('header').height()*Math.random();
    var color = $.Color(255,255,255,(($('header').height()-top)/$('header').height()).toFixed(2));
    var className = 'star'+Math.round(Math.random()*9999999);
    var el = $('<div class="star '+className+'" style="left:'+Math.round(left)+'px;top:'+Math.round(top)+'px;background-color:rgba('+color.rgba()+')"></div>');

    $.when($('header').append(el)).then(function(){
        if (isMeteor==1) {
                $('.' + className).css({
                    'transform': 'translate('+Math.round(Math.random()*$('header').width()-left-300)+'px, 100px)',
                    'transition': '1s',
                    'transition-timing-function': 'linear'
                });

            setTimeout(function () {
                $('.' + className).remove();
            }, 1000);
        }
    });
}
function createStars(){

    for(var i=0; i<$('header').width()/8; i++){
        createStar(0);
    }
}

function timer(){
    setTimeout(function() {
        createStar(1);
        timer();
    },Math.random()*30000);
}

function cl(s){
    console.log(s);
}