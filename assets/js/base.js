$('#general_search').typeahead({
	   source: function(typeahead, query) {
	   $.ajax({
		  url: BASEURL+"/master/pasien/typeahead",
		  dataType: "json",
		  type: "POST",
		  data: {
			  max_rows: max_rows_autosuggest,
			  q: query,
		  },
		  success: function(data) {
			  var return_list = [], i = data.length;
			  while (i--) {
				  return_list[i] = {id: data[i].id, value: data[i].no_rm + ' - ' + data[i].nama, no_rm: data[i].no_rm,nama: data[i].nama,tanggal_lahir: data[i].tanggal_lahir};
			  }
			  typeahead.process(return_list);
		  }
	   });
	},
	onselect: function(obj) {
	  $('#no_rms').val(obj.no_rm);
	  $('[name="general_search"]').val(obj.nama);
	},
	items: max_rows_autosuggest
 });

$(document).ready(function(){
	$('#menu ul').sliding_menu_js({
		//header_title:'jQueryScript.Net!', // the title of the header
		//header_logo: "logo.png", // logo image
		toggle_button: true, // show the toggle button
		transitionSpeed: 0.5, // the animation speed of transition
		easing: 'ease' // easing effects
	});
});