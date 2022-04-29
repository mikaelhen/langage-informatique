$(function() {
    $('.burger').on('click', function(){
        $('.burger').toggleClass('burger-open');
        $('.nav').toggleClass('mobileNav-open');
    });
});