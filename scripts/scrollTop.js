// ===== Scroll to Top ==== 
/*$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});*/
/*
$(document).scroll(function () {
    var y = $(this).scrollTop();
    if (y > 50) {
        $('#return-to-top').fadeIn(200);
    } else {
        $('#return-to-top').fadeOut(200);
    }

});*/

toTop = document.getElementById("return-to-top");

var myScrollFunc = function () {
    var y = window.scrollY;
    if (y >= 50) {
        toTop.className = "top-btn show"
    } else {
        toTop.className = "top-btn hide"
    }
};

window.addEventListener("scroll", myScrollFunc);
