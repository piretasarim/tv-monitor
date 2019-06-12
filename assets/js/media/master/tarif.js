function hrgStandar2(){
	var hna_ppn = parseFloat($('#field-hna').val()) + parseFloat(($('#field-ppn').val()/100)*$('#field-hna').val());
	var harga_jual = hna_ppn + (parseFloat($('#field-margin').val())/100)*hna_ppn
	$('#field-hna_ppn').val(isNaN(hna_ppn)?"":hna_ppn);
	$('#field-harga_terakhir').val(isNaN(harga_jual)?"":harga_jual);
}