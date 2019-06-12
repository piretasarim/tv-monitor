var count_obat = 1;
var count_cari_obat = 1;

$(document).ready(function() {
	$('.qty').numeric({});
	
	//proses tambah dan kurangi item	
    var wrapper         = $(".obat_wrap"); //Fields wrapper
	var add_button      = $(".tambah_obat"); //Add button ID
	
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
		count_obat = count_obat + 1;
		count_cari_obat = count_cari_obat + 1;
		$(wrapper).append(item_append.replace(/_1/g,"_"+count_obat).replace("(1)","("+count_obat+")").replace(/count_cari_obat/g,count_cari_obat)); //add input box   replace(/blue/g, "red")
		$('.qty').numeric({});
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').parent('div').remove();
		setHargaTotal();
    })
});

function cari_obat(id){
	$('.nama_obat_'+id).typeahead({
		source: function(typeahead, query) {
		   $.ajax({
			  url: BASEURL+"/farmasi/master_katalog/typeahead_transfer/",
			  dataType: "json",
			  type: "POST",
			  data: {
				  max_rows: max_rows_autosuggest,
				  q: query,
				  gudang_asal: $('#gudang_asal :selected').val(),
				  gudang_tujuan: $('#gudang_tujuan :selected').val()
			  },
			  success: function(data) {
				  typeahead.process(display_return_typeahead(data));
			  }
		   });
		},
		minLength: 3,
		matcher: function () { return true; },
		onselect: function(obj) {
			select_autosuggest(obj,id,'');
		},
		items: max_rows_autosuggest
	 });
}

function display_return_typeahead(data){
	var return_list = [], i = data.length;
	  while (i--) {		  
		  return_list[i] = {
		  id: data[i].id, 
		  value: data[i].namaKatalog+"("+data[i].qty+")",
		  kode: data[i].kode,
		  namaKatalog: data[i].namaKatalog,
		  satuan_besar: data[i].satuan_besar,
		  kodeSatuan: data[i].kodeSatuan,
		  qty_saldo: data[i].qty
		  }
	  }
	  
	  return return_list;
}

function select_autosuggest(obj,id,prefix){
	if(parseFloat(obj.qty_saldo) <= 0){
		if(confirm('Jumlah barang yang diminta kurang dari 1. Lanjutkan?')){
			fill_the_field(obj,id,prefix);
			return;
		}
		$('.kode_obat_'+prefix+id).val("");
		$('.nama_obat_'+prefix+id).val("");
		return;
	}
	fill_the_field(obj,id,prefix);
	return;
}

function fill_the_field(obj,id,prefix){
	$('.kode_obat_'+prefix+id).val(obj.kode);
   $('.nama_obat_'+prefix+id).val(obj.namaKatalog);
   $('.satuan_'+prefix+id).val(obj.satuan_besar);
   $('.kode_satuan_'+prefix+id).val(obj.kodeSatuan);
   $('.sel_qty_'+prefix+id).val(0);
   $('.sel_qty_diminta_'+prefix+id).val(0);
   return;
}