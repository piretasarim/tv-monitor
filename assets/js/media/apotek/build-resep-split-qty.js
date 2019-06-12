var count_obat = 1;
var count_racikan = 1;
var count_obat_racikan = 1;
var count_cari_obat = 1;
var no_r = 1;

$('input.auto').autoNumeric('init');
$(".check_split_jaminan").click(toggle_qty_split);

function toggle_qty_split() {
  if (this.checked) {
	$(this).parent().next(parent).next(parent).next(parent).next(parent).find('input').removeAttr("readonly");
  } else {
	$(this).parent().next(parent).next(parent).next(parent).next(parent).find('input').val('0.00');
	$(this).parent().next(parent).next(parent).next(parent).next(parent).next(parent).next(parent).find('input').val(0);
	$(this).parent().next(parent).next(parent).next(parent).next(parent).find('input').attr("readonly", true);
  }
}


$(document).ready(function() {
	$('.qty,.split_qty').numeric({allow:"."});
	
	//proses tambah dan kurangi item	
    var wrapper         = $(".obat_wrap"); //Fields wrapper
	var add_button      = $(".tambah_obat"); //Add button ID
	
	var wrapper_racikan         = $(".racikan_wrap"); //Fields wrapper
	var add_racikan_button      = $(".tambah_racikan"); //Add button ID
	
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
		count_obat = count_obat + 1;
		count_cari_obat = count_cari_obat + 1;
		$(wrapper).append(obat_append.replace(/_1/g,"_"+count_obat).replace("(1)","("+count_obat+")").replace(/count_cari_obat/g,count_cari_obat)); //add input box   replace(/blue/g, "red")
		$('.qty,.split_qty').numeric({allow:"."});
		$('input.auto').autoNumeric('init');
		$(".check_split_jaminan").click(toggle_qty_split);
    });
	
	$(add_racikan_button).click(function(e){ //on add input button click
        e.preventDefault();
		count_racikan = count_racikan + 1;
		count_cari_obat = count_cari_obat + 1;
		$(wrapper_racikan).append(racikan_append.replace(/_1/g,"_"+count_racikan).replace(/\(1\)/g,"("+count_racikan+")").replace(/\[1\]/g,"["+count_racikan+"]").replace(/count_cari_obat/g,count_cari_obat));
		$('input.auto').autoNumeric('init');
		$('.qty,.qty_split').numeric({allow:"."});
		$(".check_split_racikan_jaminan").click(toggle_qty_split);
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').parent('div').remove();
    })
	
	$(wrapper_racikan).on("click",".hapus_racikan", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').parent('div').remove();
    })
	
});

function tambah_obat_racik(x){
	count_cari_obat = count_cari_obat + 1;
	$("#racik_"+x).append(racikan_obat_append.replace(/_1/g,"_"+x).replace("(1)","("+x+")").replace(/\[1\]/g,"["+x+"]").replace(/_x/g,"_"+count_obat_racikan).replace("(x)","("+count_obat_racikan+")").replace(/count_cari_obat/g,count_cari_obat)); 
	count_obat_racikan = count_obat_racikan + 1;
	$('input.auto').autoNumeric('init');
	$('.qty,.qty_split').numeric({allow:"."});
	$(".check_split_racikan_jaminan").click(toggle_qty_split);
}

function hapus_obat_racikan(x){
	$(".baris_"+x).remove();
}

function get_tipe_resep(){
	var tipe_resep = $('#no_resep').val().substr(1, 2); 
	return tipe_resep;
	return;
}

function select_autosuggest(obj,id,prefix){
   $('.kode_obat_'+prefix+id).val(obj.kode);
   $('.nama_obat_'+prefix+id).val(obj.namaKatalog);
   $('.satuan_'+prefix+id).val(obj.satuan_besar);
   $('.kode_satuan_'+prefix+id).val(obj.kodeSatuan);
   $('.harga_kalkulasi_'+prefix+id).val(obj.harga_kalkulasi);
   $('.diskon_'+prefix+id).val(obj.diskon);
   $('.sel_qty_'+prefix+id).val(1);
   calc_total();
   return;
}

function cari_obat(id){
	$('.nama_obat_'+id).typeahead({
            source: function(typeahead, query) {
               $.ajax({
                  url: BASEURL+"/farmasi/master_katalog/typeahead_resep/",
                  dataType: "json",
                  type: "POST",
                  data: {
                      max_rows: max_rows_autosuggest,
                      q: query,
					  mr_no: $('#mr_no').val(),
					  cara_bayar: $('#cara_bayar').val(),
					  tipe_resep: get_tipe_resep()
                  },
                  success: function(data) {
                      typeahead.process(display_return_typeahead(data));
                  }
               });
            },
			minLength: 3,
            onselect: function(obj) {
				select_autosuggest(obj,id,'');
            },
            items: max_rows_autosuggest
         });
}

function display_return_typeahead(data){
	var return_list = [], i = data.length;
	  while (i--) {
		  eval("var warna= formularium_"+data[i].formularium+".warna;");		  
		  return_list[i] = {
		  id: data[i].id, 
		  value: '<font color='+warna+'>'+data[i].kode+ ' - ' + data[i].namaKatalog+' - '+data[i].harga_kalkulasi+'</font>',
		  /* value: data[i].kode+ ' - ' + data[i].namaKatalog+ ' - ' + data[i].kategori_obat, */
		  kode: data[i].kode,
		  namaKatalog: data[i].namaKatalog,
		  harga_kalkulasi: data[i].harga_kalkulasi,
		  satuan_besar: data[i].satuan_besar,
		  kodeSatuan: data[i].kodeSatuan,
		  diskon: data[i].diskon};
	  }
	  
	  return return_list;
}

function remove_item(id,nama_item){
	if(confirm("Ingin Menghapus "+nama_item+" ?")){
		$('#remove_id').val($('#remove_id').val() + '+'+id);
		$(".item_"+id).remove();
	}
	return;
}

function calc_total(){
	var sum = 0;
	$('.harga').each(function(){
		if (this.value != "")
		sum += parseFloat(this.value);
	});
	console.log(sum);
}

function calculate_harga_item(id,parent,class_selector){
		parent = typeof parent !== 'undefined' ? parent : 'div';
		class_selector = typeof class_selector !== 'undefined' ? class_selector : '.sel_qty_';
		
		var qty = parseFloat($('.sel_qty_'+id).autoNumeric('get'));
		var harga_satuan = parseFloat($('.sel_qty_'+id).parent().next(parent).next(parent).next(parent).next(parent).find('input').autoNumeric('get'));
		harga = qty*harga_satuan;
		if(isNaN(harga))
			harga = 0;
		$('.sel_qty_'+id).parent().next(parent).next(parent).find('input').val(harga);
}

function calculate_harga_item_racikan(id){
		calculate_harga_item(id,'th');
}

function calculate_harga_item_split(id,parent){
		parent = typeof parent !== 'undefined' ? parent : 'div';
		
		var qty = parseFloat($('.sel_split_qty_'+id).autoNumeric('get'));
		var harga_satuan = parseFloat($('.sel_split_qty_'+id).parent().next(parent).next(parent).next(parent).find('input').autoNumeric('get'));
		harga = qty*harga_satuan;
		if(isNaN(harga))
			harga = 0;
		$('.sel_split_qty_'+id).parent().next(parent).next(parent).find('input').val(harga);
}

function calculate_harga_item_split_racikan(id){
		calculate_harga_item_split(id,'th');
}