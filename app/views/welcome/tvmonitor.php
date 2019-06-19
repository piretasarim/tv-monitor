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
		},5000)
		return this
	}
	var mapping={
		table:'section class="divTable"',
		thead:'div class="divTableHeading"',
		tbody:'div class="divTableBody"',
		tr:'div class="divTableRow"',
		td:'div class="divTableCell"',
		th:'div class="divTableCell" style="color:#000;"'
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
	    function(data){

	    	for(var i=0; i<30; i++) {

	    		var no_rm = data[i].no_rm;

	    		$('#no_rm'+i).text(no_rm).css("font-weight","Bold").attr('align', 'center');
	    		// $('#terisi'+i).text(terisi).css("font-weight","Bold").css('color', '#3E630D').attr('align', 'center');
					// $('#kosong'+i).text(kosong).css("font-weight","Bold").css('color', 'red').attr('align', 'center');
					
	    	}
	    }
	);
}
</script>