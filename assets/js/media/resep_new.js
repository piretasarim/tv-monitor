$('#tgl').datepicker({"format": date_format, "weekStart": 1, "autoclose": true});
$("form select").select2();

function select_autosuggest(obj,prefix){
	if(prefix=='pasien'){
		$('#no_rm').val(obj.id);
	    $('#nama_pelanggan').val(obj.nama);
		$('#cara_bayar').val(obj.cara_bayar);
		$('#no_reg').val(obj.no_reg);
		$('#detail_reg').val(obj.detail_reg);
		$('#cara_bayar').val(obj.cara_bayar);
		$('#nama_cara_bayar').val(obj.nama_cara_bayar);
		$('#id_unik_jaminan').val(obj.id_unik_jaminan);
		// console.log(obj.no_reg);
	}else{
		$('#kode_dokter').val(obj.id_pegawai);
	    $('#nama_dokter').val(obj.nama_pegawai);
	}
	return;
}

function display_return_typeahead(data,prefix){
	if (prefix == 'pasien'){
		 var return_list = [], i = data.length;
		  while (i--) {
			  return_list[i] = {id: data[i].id, value: data[i].no_rm + ' - ' + data[i].nama, no_rm: data[i].no_rm,nama: data[i].nama,tanggal_lahir: data[i].tanggal_lahir,no_reg:data[i].no_reg,detail_reg:data[i].detail_reg,cara_bayar:data[i].cara_bayar,nama_cara_bayar:data[i].nama_cara_bayar,id_unik_jaminan:data[i].sep};
		  }
	}else{
		var return_list = [], i = data.length;
		  while (i--) {
			  return_list[i] = {id: data[i].id, value: data[i].id_pegawai + ' - ' + data[i].nama, id_pegawai: data[i].id_pegawai,nama_pegawai: data[i].nama, prosentase: data[i].prosentase};
		  }
	}
	
	return return_list;
}
 
function cari_pasien(typeresep){
$('#nama_pelanggan').typeahead({
		source: function(typeahead, query) {
		   $.ajax({
			  url: BASEURL+"/master/pasien/typeahead_resep/",
			  dataType: "json",
			  type: "POST",
			  data: {
				  max_rows: max_rows_autosuggest,
				  q: query,
				  tgl: $('#tgl').val(),
				  tipe: typeresep,
				  poli: $('.kode_poli :selected').val()
			  },
			  success: function(data) {
					//if(data != null)
						typeahead.process(display_return_typeahead(data,'pasien'));
			  }
		   });
		},
		minLength: 3,
		onselect: function(obj) {
			select_autosuggest(obj,'pasien');
		},
		items: max_rows_autosuggest
	 });
}

function cari_dokter(){
$('#nama_dokter').typeahead({
		source: function(typeahead, query) {
		   $.ajax({
			  url: BASEURL+"/master/pegawai/typeahead/",
			  dataType: "json",
			  type: "POST",
			  data: {
				  max_rows: max_rows_autosuggest,
				  q: query
			  },
			  success: function(data) {
				  typeahead.process(display_return_typeahead(data,'dokter'));
			  }
		   });
		},
		minLength: 3,
		onselect: function(obj) {
			select_autosuggest(obj,'dokter');
		},
		items: max_rows_autosuggest
	 });	
}

$('#save').on('click', function () {
	$('#form_resep').validate({ignore: null});
});