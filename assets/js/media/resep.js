//form resep
$('#tgl_resep').datepicker({"format": date_format, "weekStart": 1, "autoclose": true});
$("form select").select2();
$('#konten_obat').load(BASEURL+"/apotek/resep/load_resep/"+$('#no_resep').val()+"/"+$('#action').val()+"/");

// if(!in_array($('#cara_bayar').val(),array_cara_bayar_tunai) && $('#no_resep').val().indexOf('RJ') == 1 && typeof($('#identitas_form_tujuan').val()) == "undefined")
	// $('#konten_obat').load(BASEURL+"/apotek/resep/load_resep_split_qty/");
// else
	// $('#konten_obat').load(BASEURL+"/apotek/resep/load_resep/"+$('#no_resep').val()+"/"+$('#action').val()+"/");

$('#save').on('click', function () {
	$('#form_resep').validate({ignore: null});
	
	
	var sum=0;
	$('input.harga').each(function(i){
			var self = $(this);
			try{
				self.autoNumeric('init');
				var v = self.autoNumeric('get');
				self.autoNumeric('destroy');
				self.val(v);
				if(v != '')
					sum += parseFloat(v);
			}catch(err){
				console.log("Not an autonumeric field: " + self.attr("name"));
			}
		});
		if(confirm('harga total resep Rp. '+sum+', lanjutkan?')){
			$('#form_resep').submit();
		}else
			sum=0;
});
//
$('#save_revisi').on('click', function () {
	$('#form_resep').validate({ignore: null});
	$('input.harga').each(function(i){
        var self = $(this);
        try{
            self.autoNumeric('init');
			var v = self.autoNumeric('get');
            self.autoNumeric('destroy');
            self.val(v);
			if(v != '')
				sum += parseFloat(v);
        }catch(err){
            console.log("Not an autonumeric field: " + self.attr("name"));
        }
    });
	if($('#identitas_form_tujuan').val() == 'Confirm'){
		var win = window.open(BASEURL+'/apotek/cetak_resep/copy_resep/'+$('#no_resep').val(), '_blank');
		win.focus();
	}
	$('#form_resep').submit();
});
$('#back').on('click', function () {
	//go to list resep
	window.location.href = BASEURL+"/apotek/resep/list_resep/";
});