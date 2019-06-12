$(document).ready(function() {
	$('.datepicker').datepicker({"format": "dd-mm-yyyy", "weekStart": 1, "autoclose": true});
	$("form select").select2();
	$('.num-only').numeric();
	
	$("#btnExport").click(function () {
		$("#tblExport").btechco_excelexport({
			containerid: "tblExport"
		   , datatype: $datatype.Table
		});
	});
});

$('#nama_pasien').typeahead({
	source: function(typeahead, query) {
	   $.ajax({
		  url: BASEURL+"/master/pasien/typeahead/",
		  dataType: "json",
		  type: "POST",
		  data: {
			  max_rows: max_rows_autosuggest,
			  q: query
		  },
		  success: function(data) {
				typeahead.process(display_return_typeahead(data,'pasien'));
		  }
	   });
	},
	onselect: function(obj) {
		select_autosuggest(obj,'pasien');
	},
	items: max_rows_autosuggest
 });
 
 $('#no_reg').typeahead({
	source: function(typeahead, query) {
	   $.ajax({
		  url: BASEURL+"/pendaftaran/typeahead/",
		  dataType: "json",
		  type: "POST",
		  data: {
			  max_rows: max_rows_autosuggest,
			  q: query,
			  no_rm: $('#no_rm').val()
		  },
		  success: function(data) {
				typeahead.process(display_return_typeahead(data,'no_reg'));
		  }
	   });
	},
	onselect: function(obj) {
		select_autosuggest(obj,'no_reg');
	},
	items: max_rows_autosuggest
 }); 

$('#cari').on('click', function () {
	$('form.laporan').validate({ignore: null});
	$('form.laporan').submit();
});

function display_return_typeahead(data,type){
	var return_list = [], i = data.length;
	if(type=='pasien'){
	  while (i--) {
		  return_list[i] = {id: data[i].id, value: data[i].no_rm + ' - ' + data[i].nama, no_rm: data[i].no_rm,nama: data[i].nama};
	  }
	}else
	{
		while (i--) {
		  return_list[i] = {id: data[i].id, value: data[i].no_reg};
		}
	}
	  
	return return_list;
}

function select_autosuggest(obj,type){
	if(type=='pasien'){
		$('#no_rm').val(obj.id);
		$('#nama_pasien').val(obj.nama);
	}else{
		$('#no_reg').val(obj.id);
	}
}