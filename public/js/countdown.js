$(document).ready(function () {
    let timeLeft = 500;
    let doingTimer = setInterval(function(){
        document.getElementById("countdown").innerHTML = '<h3>' + timeLeft + " seconds remaining" + '</h3>';
        timeLeft -= 1;
        if(timeLeft < 0){
            clearInterval(doingTimer);

        }
    }, 1000);
});


var time = 60;
var initialOffset = '440';
var i = 1;

/* Need initial run as interval hasn't yet occured... */
$('.circle_animation').css('stroke-dashoffset', initialOffset-(1*(initialOffset/time)));

var interval = setInterval(function() {
    $('#abc').text(i);
    if (i == time) {
        clearInterval(interval);
        $('#reload').show();
        $('#send').hide();
        $('#timeUp').hide();
        $('#circle').hide();
        $('#abc').hide();
        $('#time').hide();

        return;
    }
    $('.circle_animation').css('stroke-dashoffset', initialOffset-((i+1)*(initialOffset/time)));
    i++;
}, 1000);
