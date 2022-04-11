$(document).ready(function () {
    $('.parent').click(function () {
        $('.sub-nav').toggleClass('visible');
    });
});

// LEFT MENU
function slidebar_open() {
    document.getElementById("Slidebar").style.display = "block";
    document.getElementById("open-slidebar").style.display = "none";
    document.getElementById("open-slidebar-mobile").style.display = "none";
    // document.getElementsByClassName("row")[0].style.marginRight = "1px";
}

function slidebar_close() {
    // document.getElementsByClassName("row")[0].style.marginRight = "auto";
    document.getElementById("open-slidebar").style.display = "block";
    document.getElementById("Slidebar").style.display = "none";
    document.getElementById("open-slidebar-mobile").style.display = "block";
}
if ($.cookie('BarOpened') === 'opened') {
    document.getElementById("Slidebar").style.display = "block";
    slidebar_open();
} else {
    document.getElementById("Slidebar").style.display = "none";
    slidebar_close();
}