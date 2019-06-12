$('#tgl').datepicker({"format": date_format, "weekStart": 1, "autoclose": true});
$("form select").select2();

$('#save').on('click', function () {
	$('#form_transfer').validate({ignore: null});
});