$(function (){
$('.arrowRight').click(function(){
    var elsuperfarLeft = $('.elementItem.superfarLeft');
    var elfarLeft = $('.elementItem.farLeft');
    var elLeft = $('.elementItem.left');
    var elMiddle = $('.elementItem.active');
    var elRight = $('.elementItem.right');
    var elfarRight = $('.elementItem.farRight');
    var elsuperfarRight = $('.elementItem.superfarRight');
    var eltextMiddle = $('.elementContentWrapper.active');
    var eltextLeft = $('.elementContentWrapper.left');
    var eltextRight = $('.elementContentWrapper.right');

    elMiddle.removeClass('active').addClass('right');
    elLeft.removeClass('left').addClass('active');
    elfarLeft.removeClass('farLeft').addClass('left');
    elRight.removeClass('right').addClass('farRight');
    elfarRight.removeClass('farRight').addClass('superfarRight');
    elsuperfarLeft.removeClass('superfarLeft').addClass('farLeft');
    elsuperfarRight.removeClass('superfarRight').addClass('superfarLeft');

    eltextMiddle.removeClass('active').addClass('right');
    eltextLeft.removeClass('left').addClass('active');
    eltextRight.removeClass('right').addClass('left');


});

$('.arrowLeft').click(function(){
    var elsuperfarLeft = $('.elementItem.superfarLeft');
    var elfarLeft = $('.elementItem.farLeft');
    var elLeft = $('.elementItem.left');
    var elMiddle = $('.elementItem.active');
    var elRight = $('.elementItem.right');
    var elfarRight = $('.elementItem.farRight');
    var elsuperfarRight = $('.elementItem.superfarRight');
    var eltextMiddle = $('.elementContentWrapper.active');
    var eltextLeft = $('.elementContentWrapper.left');
    var eltextRight = $('.elementContentWrapper.right');

    elMiddle.removeClass('active').addClass('left');
    elLeft.removeClass('left').addClass('farLeft');
    elRight.removeClass('right').addClass('active');
    elfarLeft.removeClass('farLeft').addClass('superfarLeft');
    elfarRight.removeClass('farRight').addClass('right');
    elsuperfarLeft.removeClass('superfarLeft').addClass('superfarRight');
    elsuperfarRight.removeClass('superfarRight').addClass('farRight');

    eltextMiddle.removeClass('active').addClass('left');
    eltextLeft.removeClass('left').addClass('right');
    eltextRight.removeClass('right').addClass('active');
});

var show = function(){
    $('.loadPage.shown').fadeOut('slow');
};
setTimeout(show, 2000);

})
