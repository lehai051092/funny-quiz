
let time = 60;
let initialOffset = '440';
let i = 1;

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
        $('#time').hide();

        return;
    }
    $('.circle_animation').css('stroke-dashoffset', initialOffset-((i+1)*(initialOffset/time)));
    i++;
}, 1000);
