<script type="text/javascript">

// $.fn.infiniteScrollUp=function(){
// 		var self=this,kids=self.children()
// 		kids.slice(20).hide()
// 		self.height(self.height())
// 		setInterval(function(){
// 			kids.filter(':hidden').eq(0).slideDown()
// 			kids.eq(0).slideUp(function(){
// 				$(this).appendTo(self)
// 				kids=self.children()
// 			})
// 		},5000)
// 		return this
// 	}
// 	var mapping={
// 		table:'section class="divTable"',
// 		thead:'div class="divTableHeading"',
// 		tbody:'div class="divTableBody"',
// 		tr:'div class="divTableRow"',
// 		td:'div class="divTableCell"',
// 		th:'div class="divTableCell" style="color:#000;"'
// 	}
// 	var recode={}
// 	recode.colgroup='<!'+'--'
// 	recode['/colgroup']='-->'
// 	$.each(mapping,function(i,v){
// 		recode[i]='<'+v+'>'
// 		recode['/'+i]='<\/'+v+'>'
// 	})
// 	function tableFixer(){
// 		var t= this.outerHTML.replace(/<([^>]*)>/g,function(tag,nodeName){
// 		//	console.log(tag,nodeName)
// 			return recode[nodeName]||tag
// 		})
// 	//	console.log($(this).html(),t)
// 		return '<div>'+t+'<\/div>'
// 	}
// 	$(function(){
// 		$('table').replaceWith(tableFixer);
// 		$('section').each(function(){
// 			$(this).children().eq(1).infiniteScrollUp()
// 		})
// 	})

document.addEventListener("keydown", function(e) {
	if (e.keyCode == 13) {
		toggleFullScreen();
	}
}, false);


function showTime()
{
	var m_names = new Array("Januari", "Februari", "Maret",
           				"April", "Mei", "Juni", "Juli", "Agustus", "September",
                        "Oktober", "November", "Desember");

	var today = new Date();
	var h = today.getHours();
	var m = today.getMinutes();
	var s = today.getSeconds();
	var curr_date = today.getDate();
    var curr_month = today.getMonth();
    var curr_year = today.getFullYear();
	// add a zero in front of numbers<10
	h=checkTime(h);
	m=checkTime(m);
	s=checkTime(s);
	$("#tgl").text(curr_date+" "+m_names[curr_month]+" "+curr_year);
	$("#clock").text(h+":"+m+":"+s);
	t=setTimeout('showTime()',1000);
}
function checkTime(i)
{
	if (i<10)
	{
		i="0" + i;
	}
	return i;
}
showTime();

function reloading()
{
    location.reload();
}

$(window).load(function(){
	  // run every 7s
	  setInterval('get_data()', 5000);
});

function get_data()
{
	var BASEURL = '<?= BASEURL?>'; 
	$.get(BASEURL+"/index.php/welcome/data_tiga/",  
			function(data){ //lert(data);

				var no_rm='';
				
				for(i = 0; i < data.length; i++) {

						// var warna = [
						// 	'1' : '#000000',
						// 	'2' : '#FC0D00',
						// 	'3'	: '#2FC400',
						// 	'4' : '#DAA622',
						// 	'5' : '#B100CA',
						// 	'6' : '#0027FF'						
						// ];
						
						/*
						switch (status_berkas) {
							case 1:
								var warna = '#000000';
								break;
							case 2:
								var warna = '#FC0D00';
								break;
							case 3:
								var warna = '#2FC400';
								break;
							case 4: 
								var warna = '#DAA622';
								break;
							case 5:
								var warna = '#B100CA';
								break;
							case 6:
								var_warna = '#0027FF';
								break;
						
							default:
								var_warna = '#FFFFFF';
								break;
						}
						*/
						var nama_pasien = data[i]['nama_pasien'];
						var no_rm = data[i]['no_rm'];
						var nama_poli = data[i]['nama_poli'];
						var nama_dokter = data[i]['nama_dokter'];
						var jam_kunjungan = data[i]['jam_kunjungan'];
						var no_urut = data[i]['no_urut'];
						var status_berkas = data[i]['status_berkas'];
					
						$('#no_rm'+i).text(data[i]['no_rm']).css("font-weight","Bold").attr('align', 'center');
					  $('#nama_pasien'+i).text(data[i]['nama_pasien']).css("font-weight","Bold").attr('align', 'center');
					  $('#nama_poli'+i).text(data[i]['nama_poli']).css("font-weight","Bold").attr('align', 'center');
					  $('#nama_dokter'+i).text(data[i]['nama_dokter']).css("font-weight","Bold").attr('align', 'center');
					  $('#jam_kunjungan'+i).text(data[i]['jam_kunjungan']).css("font-weight","Bold").attr('align', 'center');
					  $('#no_urut'+i).text(data[i]['no_urut']).css("font-weight","Bold").attr('align', 'center');
					  $('#status_berkas'+i).text(data[i]['status_berkas']).css("font-weight","Bold").attr('align', 'center');
						

				}

	    }
	);
}
</script>