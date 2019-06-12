//form resep
$("form select").select2();
$('#konten_obat').load(BASEURL+"/inventori/transfer_barang/load_item?no_transfer="+$('#no_transfer').val()+"&action="+$('#action').val());
$('.tgl').datepicker({"format": date_format, "weekStart": 1, "autoclose": true});

$('#form_transfer #create_permintaan').on('click', function () {
	$('#form_transfer').validate({ignore: null});
	if(confirm('Pastikan yang anda input sudah betul. Lanjutkan?')){
		$('#form_transfer').submit();
	}
});
$('#form_transfer #back').on('click', function () {
	window.location.href = BASEURL+"/inventori/transfer_barang/";
});
$('#form_transfer #confirm').on('click', function () {
	$('#form_transfer').submit();
});
$('#form_transfer #edit').on('click', function () {
	$("#form_transfer").attr("action",BASEURL+"/inventori/transfer_barang/edit_permintaan/");
	$('#form_transfer').submit();
});
