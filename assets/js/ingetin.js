$(window).load(function(){
  	setInterval('get_notif_pasien_pulang()', 15000);
	// setInterval('get_notif_inbox()', 5000);
});

function get_notif_pasien_pulang()
{
	$.get(URLDASAR+"/notif/data_pasien_pulang/",  
	    function(data){

				$.jGrowl.defaults.closerTemplate = "<div>[ xxxxx ]</div>";
				$.jGrowl.defaults.appendTo = "ul#breadcrumb";

				$.jGrowl("This message is sticky and clickable", {
					sticky: true,
					click: function(msg) {
						alert("You clicked me");
					}
				});
				$.jGrowl("This message is sticky and clickable");
	    }
	);
}

function get_notif_inbox()
{
	$.get(URLDASAR+"/notif/data_pasien_pulang/",  
	    function(data){
	    	
	    }
	);
}