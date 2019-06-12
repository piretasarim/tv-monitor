$("form select").select2();
$('#save').on('click', function () {
	$('form#form_edit_obat_gudang').validate({ignore: null});
});