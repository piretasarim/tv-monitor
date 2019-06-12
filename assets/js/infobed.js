
document.addEventListener("keydown", function(e) {
	if (e.keyCode == 13) {
		toggleFullScreen();
	}
}, false);


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

// BACKGROUND IMAGE
// SOURCE: http://www.simonbattersby.com/blog/cycling-a-background-image-with-jquery/
function cycleImages(){
	var $active = $('#background_cycler .active');
	var $next = ($('#background_cycler .active').next().length > 0) ? $('#background_cycler .active').next() : $('#background_cycler img:first');
      $next.css('z-index',2);//move the next image up the pile
	  $active.fadeOut(1500,function(){//fade out the top image
	  $active.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
      $next.css('z-index',3).addClass('active');//make the next image the top one
  });
	}

	$(window).load(function(){
	$('#background_cycler').fadeIn(1500);//fade the background back in once all the images are loaded
	  // run every 7s
	  setInterval('cycleImages()', 5000);
	  setInterval('get_bed()', 5000);
	  //setInterval('reloading()', 80000);
	});

// MARQUESS TEXT
// SOURCE: http://jsfiddle.net/lalatino/1r3957g4/
window.addEventListener('load', function () {
	function go() {
		i = i < width ? i + step : 1;
		m.style.marginLeft = -i + 'px';
	}
	var i = 0,
	step = 3,
	space = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	var m = document.getElementById('marquee');
    var t = m.innerHTML; //text
    m.innerHTML = t + space;
    m.style.position = 'absolute'; // http://stackoverflow.com/questions/2057682/determine-pixel-length-of-string-in-javascript-jquery/2057789#2057789
    var width = (m.clientWidth + 1);
    m.style.position = '';
    m.innerHTML = t + space + t + space + t + space + t + space + t + space + t + space + t + space;
    m.addEventListener('mouseenter', function () {
    	step = 0;
    }, true);
    m.addEventListener('mouseleave', function () {
    	step = 3;
    }, true);
    var x = setInterval(go, 100);
}, true);

function reloading()
{
    location.reload();
}

function get_bed()
{
	var BASEURL = '<?= BASEURL?>';

	$.get("index.php/welcome/data_bed/",  
	    function(data){

	    	// console.log(data[0].jml_kamar_sk);
	    	for(var i=0; i<15; i++) {
	    		// console.log(data[i].jml_kamar_sk);
	    		var kapasitas = data[i].jml_kamar_sk;
	    		var terisi = data[i].isi_inti;
	    		var kosong = data[i].isi_kosong;
	    		// console.log(kapasitas);
	    		$('#kapasitas'+i).text(kapasitas).css("font-weight","Bold").attr('align', 'center');;
	    		$('#terisi'+i).text(terisi).css("font-weight","Bold").css('color', '#3E630D').attr('align', 'center');;
	    		$('#kosong'+i).text(kosong).css("font-weight","Bold").css('color', 'red').attr('align', 'center');;
	    	}

	    	for(var j=15; j<28; j++) {

	    		var kapasitas = data[j].jml_kamar_sk;
	    		var terisi = data[j].isi_inti;
	    		var kosong = data[j].isi_kosong;
	    		// console.log(kapasitas);
	    		$('#kapasitas'+j).text(kapasitas).css("font-weight","Bold").attr('align', 'center');;
	    		$('#terisi'+j).text(terisi).css("font-weight","Bold").css('color', '#3E630D').attr('align', 'center');;
	    		$('#kosong'+j).text(kosong).css("font-weight","Bold").css('color', 'red').attr('align', 'center');;
	    	}

	    	for(var k=28; k<48; k++) {

	    		var kapasitas = data[k].jml_kamar_sk;
	    		var terisi = data[k].isi_inti;
	    		var kosong = data[k].isi_kosong;
	    		// console.log(kapasitas);
	    		$('#kapasitas'+k).text(kapasitas).css("font-weight","Bold").attr('align', 'center');;
	    		$('#terisi'+k).text(terisi).css("font-weight","Bold").css('color', '#3E630D').attr('align', 'center');;
	    		$('#kosong'+k).text(kosong).css("font-weight","Bold").css('color', 'red').attr('align', 'center');;
	    	}

	    }
	);
}