$(document).ready(function () {
    let timeLeft = 60;
    let doingTimer = setInterval(function(){
        document.getElementById("countdown").innerHTML = '<h3>' + timeLeft + " seconds remaining" + '</h3>';
        timeLeft -= 1;
        if(timeLeft <= 0){
            clearInterval(doingTimer);
            document.getElementById("countdown").innerHTML = '<h3>' + "Finished" + '</h3>';
        }
    }, 1000);
});
