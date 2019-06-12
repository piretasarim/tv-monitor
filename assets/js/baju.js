$('.toggle').click(function(){
   $('.toggle').not(this).removeClass("active");
   $(this).toggleClass("active");
});
// http://jsfiddle.net/3Vbz8/9/
// var $tog = $('.toggle');
// $tog.click(function(){
//    $tog.not(this).removeClass('active');
//    $(this).toggleClass('active');
// });