function do_fill_the_kode(){
	text_kode = "SOAP."+moment($('#field-backdate').val(),'DD/MM/YYYY hh:mm:ss').format('YYMMDD')+'.'+$('#detail_reg').val()+'.'+$('#field-shift :selected').val();
	$('#kode_soap').val(text_kode);
}

$('#field-backdate,#field-shift').change(function(e) {
	do_fill_the_kode();
});