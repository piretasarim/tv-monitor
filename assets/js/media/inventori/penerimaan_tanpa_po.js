$("form select").select2();
$('#konten_obat').load(BASEURL+"/inventori/penerimaan_barang/load_item/?no_po="+$('#no_po').val());
$('form#form_penerimaan_barang_xpo .dateinput').datepicker({"format": date_format, "weekStart": 1, "autoclose": true});


function setSubtotal(id,tipe){
	var hna_qty = parseFloat($('#harga_beli_'+id).val()) * parseFloat($('#qty_'+id).val());
	var diskon_rp = (parseFloat($('#discount_'+id).val())/100)*hna_qty;
	
	var subtotal = hna_qty - diskon_rp;
	
	$('.discount_nominal_'+id).val(isNaN(diskon_rp)?"":diskon_rp);
	$('.subtotal_'+id).val(isNaN(subtotal)?"":subtotal);
	
	setHargaTotal();
}

function setHargaTotal(){
	var subtotal  = document.getElementsByName('subtotal[]');
	var total = 0;
	var total_ppn = 0;
	
	for(var i=0; i<subtotal.length; i++) {
        total = total + parseFloatReturnZero(subtotal[i].value);
    }
	
	total = total + parseFloatReturnZero($('#biaya_materai').val());
	total_ppn = ((parseFloatReturnZero($('#ppn').val())/100)*total) + total;
	console.log(total,total_ppn);
	$('.total_sebelum_ppn').val(isNaN(total)?"":total);
	$('.grand_total').val(isNaN(total_ppn)?"":total_ppn);
}

$('form#form_penerimaan_barang_xpo #save').on('click', function () {
	$('form#form_penerimaan_barang_xpo').validate({ignore: null});
	if(confirm('Data yang diinput akan langsung menambah stok. Data yang Anda Masukkan sudah benar?')){
		$('form#form_penerimaan_barang_xpo').submit();
	}
});