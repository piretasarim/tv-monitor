$(document).ready(function(e) {
	$("form#form_ri select").select2();
	$("form#form_ri .datepicker").datepicker({"format": date_format, "weekStart": 1, "autoclose": true});
	$('form#form-ri-list').validate({ignore: null});
	$('#field-backdate').datepicker({
		format: date_format
	 });
});

function gantiPoli(valInstalasi,selectorPoli){
	$.ajax({
         url: BASEURL+"/master/poli/dropdown_for_mr/" + valInstalasi,
         dataType: "json",
         type: "GET",
         success: function(data) { 
            addOption($(selectorPoli), data, 'id_poli', 'nama_poli');

         }
    });
}
function addOption(ele, data, key, val) { //alert(data.length);
   $('option', ele).remove();  
   ele.append(new Option('', ''));
   $(data).each(function(index) { //alert(eval('data[index].' + nama));
      ele.append(new Option(eval('data[index].' + val), eval('data[index].' + key)));
   });
}