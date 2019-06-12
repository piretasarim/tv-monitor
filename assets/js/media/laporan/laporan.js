  	/*
     * ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
     *  CARA MANGGIL FILE INI DI VIEWS:
     *	1. <?= include APPPATH."views/var_js.php"; ?> (Buat yang gak pake master_controller()) di paling atas. *kata mastah mas aris....
     * 	2. <?= script_tag('assets/js/media/akunting/laporan.js'); ?>
     * //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     */

  $('#tgl1').datepicker({"format": "dd-mm-yyyy", "weekStart": 1, "autoclose": true});
  $('#tgl2').datepicker({"format": "dd-mm-yyyy", "weekStart": 1, "autoclose": true});

  /* /////////////////////////
   * Tambahain: 
   * <?= script_tag('assets/js/table-fixed-header.js');?>
   * class .table-fixed-header dengan width: 100%	 
   * /////////////////////////
   */
  $(document).ready(function(){
  	$('.table-fixed-header').fixedHeader();
  });

    /*
    using: #externalCSS button id, #toPrint div id untuk table,
    */
    $(document).ready(function() {
         // $("#simplePrint").click(function() {
         //     printElem({});
         // });
         // $("#PrintinPopup").click(function() {
         //     printElem({ 
         //          printMode: 'popup',
         //          printBodyOptions: { styleToAdd: 'border: 1px; padding:10px; font-size: 20px;' }
         //     });
         // });
         // $("#ChangeTitle").click(function() {
         //     printElem({ pageTitle: 'thisWillBeTheNameInThePrintersLog.html' });
         // });
         // $("#PopupandLeaveopen").click(function() {
         //     printElem({ leaveOpen: true, printMode: 'popup' });
         // });
         // $("#stripCSS").click(function() {
         //     printElem({ overrideElementCSS: true });
         // });
	$("#externalCSS").click(function() {
	    	printElem({ printMode: 'popup', overrideElementCSS: ['BASEURL+"/assets/css/print-table.css"'] });
	    });
	});

  /* /////////////////////////
   * Tambahain: 
   * <div id="toPrint"> di tag awal <table>
   * /////////////////////////
   */
    function printElem(options){
    	$('#toPrint').printElement(options);
    }

    /* export ke eksel, using just put the id of table, #tblExport */
    $(document).ready(function () {
    	$("#btnExport").click(function () {
    		$("#tblExport").btechco_excelexport({
    			containerid: "tblExport"
    			, datatype: $datatype.Table
    		});
    	});
    });

    /*
     * ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
     *  TARO ACTION CONTROLLER DI BAWAH INI, DIATAS BUAT PLUGIN PLUGIN JQUERY/ JS LAENNYA YANG DIPAKE OKEH BEROH.........................
     * //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     */
