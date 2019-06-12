$("form .datetimepicker").datetimepicker({format: 'dd-mm-yyyy hh:ii'});
$("form select").select2();

function type_dokter(){
	$('form .nama_dokter').typeahead({
            source: function(typeahead, query) {
               $.ajax({
                  url: BASEURL+'/master/pegawai/typeahead/',
                  dataType: "json",
                  type: "POST",
                  data: {
                      max_rows: max_rows_autosuggest,
                      q: query,
                  },
                  success: function(data) {
                      var return_list = [], i = data.length;
                      while (i--) {
                          return_list[i] = {id: data[i].id, value: data[i].id_pegawai + ' - ' + data[i].nama, id_pegawai: data[i].id_pegawai,nama_pegawai: data[i].nama, prosentase: data[i].prosentase};
                      }
                      typeahead.process(return_list);
                  }
               });
            },
            onselect: function(obj) {
			   $('form .id_dokter').val(obj.id_pegawai);
			   $('form .nama_dokter').val(obj.nama_pegawai);
            },
            items: max_rows_autosuggest
         });
}

$('#save').on('click', function () {
	$('#form_registrasi').validate({ignore: null});
	
	
		if(confirm('Lanjutkan untuk save ?')){
			$('#form_registrasi').submit();
		}
});