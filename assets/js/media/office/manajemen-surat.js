
$(document).ready(function(){
  var notif = $('#notif');
  notif.colorpickerplus();
  notif.on('changeColor', function(e){
	if(e.color==null)
	  $(this).val('transparent').css('background-color', '#fff');//tranparent
	else
	  $(this).val(e.color).css('background-color', e.color);
  });
});
