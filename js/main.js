var map;
var widthWindow;

function createMap(){
    if (map==null) {
        map = new ymaps.Map("map", {
            center: [55.83882406889197, 37.4080495],
            zoom: 13
        });
        map.geoObjects.add(new ymaps.Placemark([55.83882406889197, 37.4080495], {hintContent: 'ЗАО "Унипромтех"'}));
    }
}
ymaps.ready(function(){
    createMap();

    widthWindow = $(window).width();
    $(window).resize(function(){
        if ($(window).width()< widthWindow) {
            if (map!=null) {
                map.destroy();
                map.events.add('destroy', function (event) {
                    map = null;
                    createMap();
                });
            }
        }
        widthWindow = $(window).width();
    });
});