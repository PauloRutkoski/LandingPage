$(document).ready(function() {
    move_div("h3", 1000);
    enlarge_text("h3", 1000); 
    move_div("p", 2000);
});

function move_div(div, time){
    $(div).animate(
        {
        'text-indent' : '0px'
        } , 
        time
    );
}

function enlarge_text(div, time){
    $(div).animate(
        {
            'font-size' : '40px'
        },
        time   
    );
}


