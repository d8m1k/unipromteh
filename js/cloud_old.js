var puffs = 1;
var particlesPerPuff = 2000;
var img = '/img/smoke.png';

var smokeImage = new Image();

$(document).ready(function(){
    canvasWidth = 200;
    canvasHeight = 200;

    pCount = 0;

    pCollection = new Array();

    smokeImage.src = img;

    for (var i1 = 0 ; i1 < puffs; i1++)
    {
        var puffDelay = i1 * 1500; //300 ms between puffs

        for (var i2 = 0 ; i2 < particlesPerPuff; i2++)
        {
            addNewParticle((i2*50) + puffDelay);
        }
    }

    draw(new Date().getTime(), 3000);
});

function addNewParticle(delay){

    var p = {};
    p.top = canvasHeight;
    p.left = randBetween(-200,800);

    p.start = new Date().getTime() + delay;
    p.life = 8000;
    p.speedUp = 30;


    p.speedRight = randBetween(0,20);

    p.rot = randBetween(-1,1);
    p.red = Math.floor(randBetween(0,255));
    p.blue = Math.floor(randBetween(0,255));
    p.green = Math.floor(randBetween(0,255));


    p.startOpacity = .3
    p.newTop = p.top;
    p.newLeft = p.left;
    p.size = 200;
    p.growth = 10;

    pCollection[pCount] = p;
    pCount++;
}

function draw(startT, totalT){
    //Timing
    var timeDelta = new Date().getTime() - startT;
    var stillAlive = false;

    //Grab and clear the canvas
    var c= $("canvas")[0];
    var ctx=c.getContext("2d");
    ctx.clearRect(0, 0, c.width, c.height);

    //Loop through particles
    for (var i= 0; i < pCount; i++) {
        //Grab the particle
        var p = pCollection[i];

        //Timing
        var td = new Date().getTime() - p.start;
        var frac = td/p.life

        if (td > 0) {
            if (td <= p.life )
            { stillAlive = true; }

            //attributes that change over time
            var newTop = p.top - (p.speedUp * (td/1000));
            var newLeft = p.left + (p.speedRight * (td/1000));
            var newOpacity = Math.max(p.startOpacity * (1-frac),0);

            var newSize = p.size + (p.growth * (td/1000));
            p.newTop = newTop;
            p.newLeft = newLeft;

            //Draw!
            ctx.fillStyle = 'rgba(150,150,150,' + newOpacity + ')';
            ctx.globalAlpha  = newOpacity;
            ctx.drawImage(smokeImage, newLeft, newTop, newSize, newSize);
        }
    }

    //Repeat if there's still a living particle
    requestAnimationFrame(function(){draw(startT,totalT);});
}

function randBetween(n1,n2){
    return (Math.random() * (n2 - n1)) + n1;
}

function clog(s) {
    console.log(s);
}