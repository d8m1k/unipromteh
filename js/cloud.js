var layers = [],
    objects = [],

    world,

    d = 0,
    p = 400,
    worldXAngle = 0,
    worldYAngle = 0,
    width,
    height;

$(document).ready(function(){
    if ($(window).width()<$('.max-width').width()) return;

    (function() {
        var lastTime = 0;
        var vendors = ['ms', 'moz', 'webkit', 'o'];
        for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
            window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
            window.cancelRequestAnimationFrame = window[vendors[x]+
            'CancelRequestAnimationFrame'];
        }

        if (!window.requestAnimationFrame)
            window.requestAnimationFrame = function(callback, element) {
                var currTime = new Date().getTime();
                var timeToCall = Math.max(0, 16 - (currTime - lastTime));
                var id = window.setTimeout(function() { callback(currTime + timeToCall); },
                    timeToCall);
                lastTime = currTime + timeToCall;
                return id;
            };

        if (!window.cancelAnimationFrame)
            window.cancelAnimationFrame = function(id) {
                clearTimeout(id);
            };
    }());

    layers = [];
    objects = [];

    world = $('main>div')[0];

    generate();

    update();
});

function createCloud(isRight) {
    var div = document.createElement( 'div'  );
    div.className = 'cloudBase';

    var x = isRight==1 ? randomBetween($('main>div').width(), $('main>div').width()+width) : randomBetween(-width-256, -256);
    var y = randomBetween(0,height-128);
    var yy=y;
    var z = randomBetween(-256,256);
    var t = 'translateX( ' + x + 'px ) translateY( ' + y + 'px ) translateZ( ' + z + 'px )';
    div.style.webkitTransform = t;
    div.style.MozTransform = t;
    div.style.oTransform = t;

    ($('main>div')[0]).insertBefore( div, $('main>div>*')[0]);

    for( var j = 0; j < (height-128-yy)/(height-128)*10 + Math.random() * 5 ; j++ ) {
        var cloud = document.createElement( 'img' );
        cloud.style.opacity = 0;
        var r = Math.random();
        var src = '/img/cloud.png';
        ( function( img ) { img.addEventListener( 'load', function() {
            img.style.opacity = .1;
        } ) } )( cloud );
        cloud.setAttribute( 'src', src );
        cloud.className = 'cloudLayer';

        var x = 256 - ( Math.random() * 512 );
        var y = 256 - ( Math.random() * 512 );
        var z = 100 - ( Math.random() * 200 );
        z=0;
        var a = Math.random() * 360;
        var s = .25 + Math.random();
        sX = 1-(height-128-yy)/(height-128)+Math.random()*0.25;
        sY = 1-(height-128-yy)/(height-128)+Math.random()*0.25;

        x *= .2; y *= .1;
        cloud.data = {
            x: x,
            y: y,
            z: z,
            a: a,
            s: s,
            sX: sX,
            sY: sY,
            speed: 2*(Math.random()-0.5)
        };
        var t = 'translateX( ' + x + 'px ) translateY( ' + y + 'px ) translateZ( ' + z + 'px ) rotateZ( ' + a + 'deg ) scaleX( ' + sX + ' ) scaleY( ' + sY + ' )';
        cloud.style.webkitTransform = t;
        cloud.style.MozTransform = t;
        cloud.style.oTransform = t;

        div.appendChild( cloud );
        layers.push( cloud );
    }

    return div;
}

function generate() {
    width= ($('main').width()-$('main>div').width())/2;
    height= $(world).height();
    clouds = 15*(width+256)/256;

    objects = [];
    $('main>div>.cloudBase').remove();
    for(var i=0; i<=1; i++)
        for( var j = 0; j < clouds; j++ ) {
            objects.push( createCloud(i) );
        }
}

function updateView() {
    var t = 'translateZ( ' + d + 'px ) rotateX( ' + worldXAngle + 'deg) rotateY( ' + worldYAngle + 'deg)';
    world.style.webkitTransform = t;
    world.style.MozTransform = t;
    world.style.oTransform = t;
}

function update (){

    for( var j = 0; j < layers.length; j++ ) {
        var layer = layers[ j ];
        layer.data.a += layer.data.speed;
        var t = 'translateX( ' + layer.data.x + 'px ) translateY( ' + layer.data.y + 'px ) translateZ( ' + layer.data.z + 'px ) rotateY( ' + ( - worldYAngle ) + 'deg ) rotateX( ' + ( - worldXAngle ) + 'deg ) rotateZ( ' + layer.data.a + 'deg ) scaleX( ' + layer.data.sX + ') scaleY( ' + layer.data.sY + ')';
        layer.style.webkitTransform = t;
        layer.style.MozTransform = t;
        layer.style.oTransform = t;
    }

    requestAnimationFrame( update );

}

function randomBetween(n1,n2){
    return Math.random()*(n2-n1)+n1;
}

//window.addEventListener( 'mousewheel', onContainerMouseWheel );
//window.addEventListener( 'DOMMouseScroll', onContainerMouseWheel );

//window.addEventListener( 'mousemove', function( e ) {
//    worldYAngle = -( .5 - ( e.clientX / window.innerWidth ) ) * 180;
//    worldXAngle = ( .5 - ( e.clientY / window.innerHeight ) ) * 180;
//    updateView();
//} );

function cl(s){
    console.log(s);
}


function onContainerMouseWheel( event ) {
    event = event ? event : window.event;
    d = d - ( event.detail ? event.detail * -5 : event.wheelDelta / 8 );
    updateView();
}
