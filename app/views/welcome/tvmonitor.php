<script type="text/javascript">

$.fn.infiniteScrollUp=function(){
		var self=this,kids=self.children()
		kids.slice(20).hide()
		self.height(self.height())
		setInterval(function(){
			kids.filter(':hidden').eq(0).slideDown()
			kids.eq(0).slideUp(function(){
				$(this).appendTo(self)
				kids=self.children()
			})
		},1400)
		return this
	}
	var mapping={
		table:'section class="table"',
		thead:'div class="thead"',
		tbody:'div class="tbody"',
		tr:'div class="tr"',
		td:'div class="td"',
		th:'div class="th text-center"'
	}
	var recode={}
	recode.colgroup='<!'+'--'
	recode['/colgroup']='-->'
	$.each(mapping,function(i,v){
		recode[i]='<'+v+'>'
		recode['/'+i]='<\/'+v+'>'
	})
	function tableFixer(){
		var t= this.outerHTML.replace(/<([^>]*)>/g,function(tag,nodeName){
		//	console.log(tag,nodeName)
			return recode[nodeName]||tag
		})
	//	console.log($(this).html(),t)
		return '<div>'+t+'<\/div>'
	}
	$(function(){
		$('table').replaceWith(tableFixer);
		$('section').each(function(){
			$(this).children().eq(1).infiniteScrollUp()
		})
	})

document.addEventListener("keydown", function(e) {
	if (e.keyCode == 13) {
		toggleFullScreen();
	}
}, false);


function fungsi(x)
{
  if(x == 'off'){
    $('#diam').val('1');
    $('#on_span').show();
    $('#off_span').hide();
  }
  else{
    $('#diam').val('0');
    $('#on_span').hide();
    $('#off_span').show();
  }
}

function toggleFullScreen() {
  if (!document.fullscreenElement &&    // alternative standard method
      !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {  // current working methods
  	if (document.documentElement.requestFullscreen) {
  		document.documentElement.requestFullscreen();
  	} else if (document.documentElement.msRequestFullscreen) {
  		document.documentElement.msRequestFullscreen();
  	} else if (document.documentElement.mozRequestFullScreen) {
  		document.documentElement.mozRequestFullScreen();
  	} else if (document.documentElement.webkitRequestFullscreen) {
  		document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
  	}
  } else {
  	if (document.exitFullscreen) {
  		document.exitFullscreen();
  	} else if (document.msExitFullscreen) {
  		document.msExitFullscreen();
  	} else if (document.mozCancelFullScreen) {
  		document.mozCancelFullScreen();
  	} else if (document.webkitExitFullscreen) {
  		document.webkitExitFullscreen();
  	}
  }
}

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

function get_bed()
{
	var BASEURL = '<?= BASEURL?>';

	$.get(BASEURL+"/index.php/welcome/data_bed/",  
	    function(data){

	    	// console.log(data[0].jml_kamar_sk);
	    	for(var i=0; i<15; i++) {

	    		var isi_pasien_gabungan = parseInt(data[i].isi_inti) + parseInt(data[i].isi_cadangan);
	    		// console.log(data[i].jml_kamar_sk);
	    		var kapasitas = data[i].jml_kamar_sk;

	    		if(isi_pasien_gabungan > kapasitas)
	    			var terisi = kapasitas;
	    		else
	    			var terisi = isi_pasien_gabungan;
		
          var kosong_akum = parseInt(data[i].jml_kamar_sk) - parseInt(isi_pasien_gabungan);
          if(kosong_akum < 0)
          	var kosong = 0;
          else
          	var kosong = kosong_akum;

	    		// console.log(data[i].jml_kamar_sk);
	    		// var kapasitas = data[i].jml_kamar_sk;
	    		// var terisi = data[i].isi_inti;
	    		// var kosong = data[i].isi_kosong;
	    		// console.log(kapasitas);
	    		$('#kapasitas'+i).text(kapasitas).css("font-weight","Bold").attr('align', 'center');;
	    		$('#terisi'+i).text(terisi).css("font-weight","Bold").css('color', '#3E630D').attr('align', 'center');;
	    		$('#kosong'+i).text(kosong).css("font-weight","Bold").css('color', 'red').attr('align', 'center');;
	    	}

	    	for(var j=15; j<28; j++) {

	    		var isi_pasien_gabungan = parseInt(data[j].isi_inti) + parseInt(data[j].isi_cadangan);

	    		var kapasitas = data[j].jml_kamar_sk;

	    		if(isi_pasien_gabungan > kapasitas)
	    			var terisi = kapasitas;
	    		else
	    			var terisi = isi_pasien_gabungan;

	    		var kosong_akum = parseInt(data[j].jml_kamar_sk) - parseInt(isi_pasien_gabungan);
          if(kosong_akum < 0)
          	var kosong = 0;
          else
          	var kosong = kosong_akum;

	    		// var kapasitas = data[j].jml_kamar_sk;
	    		// var terisi = data[j].isi_inti;
	    		// var kosong = data[j].isi_kosong;
	    		// console.log(kapasitas);
	    		$('#kapasitas'+j).text(kapasitas).css("font-weight","Bold").attr('align', 'center');;
	    		$('#terisi'+j).text(terisi).css("font-weight","Bold").css('color', '#3E630D').attr('align', 'center');;
	    		$('#kosong'+j).text(kosong).css("font-weight","Bold").css('color', 'red').attr('align', 'center');;
	    	}

	    	for(var k=28; k<48; k++) {

	    		var isi_pasien_gabungan = parseInt(data[k].isi_inti) + parseInt(data[k].isi_cadangan);
	    		var kapasitas = data[k].jml_kamar_sk;

	    		if(isi_pasien_gabungan > kapasitas)
	    			var terisi = kapasitas;
	    		else
	    			var terisi = isi_pasien_gabungan;

	    		var kosong_akum = parseInt(data[k].jml_kamar_sk) - parseInt(isi_pasien_gabungan);
          if(kosong_akum < 0)
          	var kosong = 0;
          else
          	var kosong = kosong_akum;

	    		// var kapasitas = data[k].jml_kamar_sk;
	    		// var terisi = data[k].isi_inti;
	    		// var kosong = data[k].isi_kosong;
	    		// console.log(kapasitas);
	    		$('#kapasitas'+k).text(kapasitas).css("font-weight","Bold").attr('align', 'center');;
	    		$('#terisi'+k).text(terisi).css("font-weight","Bold").css('color', '#3E630D').attr('align', 'center');;
	    		$('#kosong'+k).text(kosong).css("font-weight","Bold").css('color', 'red').attr('align', 'center');;
	    	}

	    }
	);
}
</script>