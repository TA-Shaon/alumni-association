
$(window).load(function(){
    $("#login_form").css("z-index","-10");
});
$(document).ready(function(){

    $(window).scroll(function () {
        console.log($(window).scrollTop()) //if you hard code, then use console .log to determine when you want the nav bar to stick.
        if ($(window).scrollTop() > 195) {
            $('.nav').addClass('navbar-fixed');
        }
        if ($(window).scrollTop() < 196) {
            $('.nav').removeClass('navbar-fixed');
        }
    });

    $("#login_call").click(function(){
        var maskHeight =$(window).height();
        var maskWidth = $(window).width();
        $('#fade').css({ 'width': maskWidth, 'height': maskHeight,'opacity':0.5,'z-index':40 });
        $("#login_form").css("z-index","60");
        return false;
    });
    $("#close_login").click(function(){
        $('#fade').css({ 'width':0, 'height':0,'opacity':0,'z-index':-40 });
        $("#login_form").css("z-index","-10");
    });

    $("#eventAttend").click(function(){

    });

    $(function(){
        $('.slider img:gt(0)').hide();
        setInterval(function(){
            $('.slider :first-child').fadeOut(3000)
                .next('img').fadeIn(3000)
                .end().appendTo('.slider');
            },5000);
    });

});
