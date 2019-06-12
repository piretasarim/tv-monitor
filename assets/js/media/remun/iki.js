var BASEURL;

$(function(){
	function tally (selector) {
		$(selector).each(function () {
			var total = 0,
			    // this column has a data show
				column = $(this).siblings(selector).andSelf().index(this); //console.log(column);
			$(this).parents().prevUntil(':has(' + selector + ')').each(function () {
				total += parseFloat($('.target:eq(' + column + ')', this).html()) || 0; //console.log(total);
			})
			$(this).html(total);
		});
	}
	tally('td.subtotal');
	tally('td.total');
});

// source: http://www.dotnetcurry.com/jquery/1189/jquery-table-calculate-sum-all-rows
// source: http://jsfiddle.net/ze83fuzx/1/

// $(function () {
function get_iki() { //alert('test');
	// $('.pnm, .price, .subtot, .grdtot').prop('readonly', true);
	var $tblrows = $("#input-iki tbody tr"); //console.log($tblrows);

	$tblrows.each(function (index) {
		var $tblrow = $(this); //console.log($tblrow);

		$tblrow.find('.target').on('change', function () {

			var target = $tblrow.find("[name=target]").val(); 
			var bobot = $tblrow.find("[name=bobot]").val();
			var subTarget = $tblrow.find("[name=target1]").val();
			// var subBobot = $tblrow.find("[name=bobot").val();
			// var subIndex = $tblrow.find("").val();
			// var subTotal = parseInt(qty, 10) * parseFloat(price);
			var subTotal = parseInt(target) * parseInt(bobot) / 100;
			// console.log(subTotal);

			if (!isNaN(subTotal)) {

				$tblrow.find('.hasil').val(subTotal.toFixed(2));
				// var grandTotal = 0;

				// $(".hasil").each(function () {
				// 	var stval = parseFloat($(this).val());
				// 	grandTotal += isNaN(stval) ? 0 : stval;
				// });

				// $('.grdtot').val(grandTotal.toFixed(2));
			}
		});
	});
}
// });
get_iki();

// function get_iki()
// {
// 	$.get(BASEURL+"/remun/get_iki",  
// 	    function(data){ //console.log(data);

// 	    	tot_all = data.length;

// 	    	for(var i=0; i<tot_all; i++) {

// 		    	var id = data[i].ID_MAPPING_INDIKATOR;
// 		    	var tg = data[i].TARGET;
// 		    	var bb = data[i].BOBOT;

// 		    	var target = $("#target_"+id).val();
// 				var bobot = $("#bobot_"+id).val();
// 		    	var hasil = $("#hasil_"+id).val();

// 		    	// hitung = capaian * bobot / 100
// 		    	hitung = target * bobot / 100;
// 		    	// console.log(target);

// 		    	// source: http://jsfiddle.net/gXdwb/3/
// 		    	$('#list-data td:not(.totalColumn) input:text').bind('keyup change', function() {
// 				    var $table = $(this).closest('table');
// 				    var total = 0;
// 				    var thisNumber = $(this).attr('class').match(/(\d+)/)[1];

// 				    $table.find('td:not(.totalColumn) .target_'+thisNumber).each(function() {
// 				        total += +$(this).val();
// 				    });

// 				    $table.find('.totalColumn td:nth-child('+thisNumber+') input').val(total);
// 				});

// 		  	//  var target2 = $("#target_"+id).val();

// 				// $("#target_"+id).bind("click", function() {
// 			 //       alert($("#target_"+id).val());
// 			 //       // var eh = $("#target_"+id).val();
// 			 //       // alert(eh);
// 			 //       // hitung2 = eh * bobot / 100;
// 			 //       // $('#hasil_'+id).text(hitung2).css("font-weight","Bold").css('color', '#3E630D').attr('align', 'center');;
// 			 //    });

// 				$('#hasil_'+id).text(hitung).css("font-weight","Bold").css('color', '#3E630D').attr('align', 'center');;

// 	    	}
// 	    }
// 	);
// }

// source: www.jakartanotebook.com
// var BASEURL;

// if( typeof(IKI) === 'undefined' ) {
// 	var IKI = function() {}
// 	IKI.prototype = {
//         _isUpdating: false,

//         getData: function() {
//         	$.get(BASEURL+"/remun/get_iki", getData);
//         },

//         updateIndex: function() {
//         	tot_all = data.length;

//         	for(var i=0; i<tot_all; i++) {

//         	}
//         }
//     }
// }