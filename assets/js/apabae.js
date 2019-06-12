$(document).ready(function(){
    $('.animated').autosize();
   // var tanggal_awal = $('td.data').next().next().text().toString();
   // var splitTgl = tanggal_awal.split(" ");
   // alert(splitTgl);   
});

$(document).on("click", ".save", function(e) {
            bootbox.confirm("Are you sure?", function(result) {
  				if (result === true) {
  					$('.save').closest('form').submit()
  				};
			}); 
        });

$(document).on("click", ".update", function(e) {
            bootbox.confirm("Do you want to save the changes ?", function(result) {
  				if (result === true) {
  					$('.update').closest('form').submit()
  				};
			}); 
        });

$('.edit').click(function()
{
			// var id = $(this).parent().prev().prev().prev().prev().prev().prev().prev().text();
        	// var judul = $(this).parent().prev().prev().prev().prev().prev().prev().text();
        	// var detail = $(this).parent().prev().prev().prev().prev().prev().text();
        	// var tgl_awal = $(this).parent().prev().prev().prev().prev().text();;
        	// var tgl_akhir = $(this).parent().prev().prev().prev().text();
        	// var prioritas = $(this).parent().prev().prev().text();
        	// var status = $(this).parent().prev().text();
        	
        	$('.modal-content #id').val(id);
        	$('.modal-content #judul_kegiatan').val(judul);
        	$('.modal-content #detail_kegiatan').val(detail);
        	$('.modal-content #tanggal_awal').val(tgl_awal);
        	$('.modal-content #tanggal_akhir').val(tgl_akhir);
        	$('.modal-content #priority').val(prioritas);
        	$('.modal-content #status').val(status);
        	$('modal-user').modal({show:true});
    	});
		
$('ul.tabs').each(function(){
    // For each set of tabs, we want to keep track of
    // which tab is active and it's associated content
    var $active, $content, $links = $(this).find('a');

    // If the location.hash matches one of the links, use that as the active tab.
    // If no match is found, use the first link as the initial active tab.
    $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
    $active.addClass('active');

    $content = $($active[0].hash);

    // Hide the remaining content
    $links.not($active).each(function () {
      $(this.hash).hide();
    });

    // Bind the click event handler
    $(this).on('click', 'a', function(e){
      // Make the old tab inactive.
      $active.removeClass('active');
      $content.hide();

      // Update the variables with the new link and content
      $active = $(this);
      $content = $(this.hash);

      // Make the tab active.
      $active.addClass('active');
      $content.show();

      // Prevent the anchor's default click action
      e.preventDefault();
    });
  });