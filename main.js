let btn = $('#button');

$(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show'); //to show the button
    } else {
        btn.removeClass('show'); // to make the button invisible
    }
});

btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300'); //this function will trigger to scroll top when clicking the button
});
