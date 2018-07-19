$(function() {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 350) {
        $("nav").addClass("changeColorNavbar");
        $("div.navbar-right").addClass("changeNavbarRight");
     
            } 
        if ($(this).scrollTop() < 350) {
     
        $("nav").removeClass("changeColorNavbar");
        $("div.navbar-right").addClass("changeNavbarRight");
            } 
});
});