$('form .datetimepicker').datetimepicker({format: 'dd-mm-yyyy hh:ii'});
$("form select").select2();

$('#save').on('click', function () {
	$('#form_create_draft_so').validate({ignore: null});
});
$('#adj_negatif').on('click', function () {
	if($('#depo :selected').val() == ''){
		alert('depo tidak boleh kosong');
		return false;
	}
	if($('#waktu_sebelumnya').val() == ''){
		alert('waktu final so sebelumnya tidak boleh kosong');
		return false;
	}	
	waktu_sebelumnya = $('#waktu_sebelumnya').val();
	window.open(BASEURL+'/inventori/stock_opname/pre_adjust_negatif/'+$('#depo :selected').val()+'/'+waktu_sebelumnya.replace(" ","+").replace(":","x")+'/', '_blank');
});

$(document).on("focusin", ".datetimepicker", function(event) {
  $(this).prop('readonly', true);
});

$(document).on("focusout", ".datetimepicker", function(event) {
  $(this).prop('readonly', false);
});