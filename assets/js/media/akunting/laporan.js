      /*
     * ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
     *  CARA MANGGIL FILE INI DI VIEWS:
     *  1. <?= include APPPATH."views/var_js.php"; ?> (Buat yang gak pake master_controller()) di paling atas. *kata mastah mas aris....
     *  2. <?= script_tag('assets/js/media/akunting/laporan.js'); ?>
     * //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     */

     $('#tgl1').datepicker({"format": "dd-mm-yyyy", "weekStart": 1, "autoclose": true});
     $('#tgl2').datepicker({"format": "dd-mm-yyyy", "weekStart": 1, "autoclose": true});

     $(document).ready(function(){
      $('.table-fixed-header').fixedHeader();
    });

    $(document).ready(function() {
    // var extraFilter = '<label>Poli: <select name="poli"></select></label><label>Tanggal: <input type="text" name="tgl" /></label>';
    //$('.extra-filter').attr('id', 'extra-filter').html(extraFilter);
    $('[name="instalasi"]').change(function() {
      $.ajax({
       url: BASEURL+"/master/poli/dropdown/" + $(this).val(),
       dataType: "json",
       type: "GET",
           success: function(data) { //
            addOption($('[name="poli"]'), data, 'id_poli', 'nama_poli');
          }
        });
    });

     function addOption(ele, data, key, val) { //alert(data.length);
        $('option', ele).remove();
        ele.append(new Option('', 9999));
        $(data).each(function(index) { //alert(eval('data[index].' + nama));
          ele.append(new Option(eval('data[index].' + val), eval('data[index].' + key)));
        });
      }
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
     printElem({ printMode: 'popup', printBodyOptions: { styleToAdd: 'border: 1px;'} });
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

  /* please more action write below this line */

    // source: http://stackoverflow.com/a/16016019
    //  var dropdown = document.getElementById("instalasi");
    //    dropdown.onchange = function(event){
    //        //if(dropdown.value != " "){
    //     var style = dropdown.value != " " ? 'none' : 'block';
    //     document.getElementById("aha").style.display = style;
    //      //}
    // }
    // var dropdown2 = document.getElementById("user");
    //  dropdown2.onchange = function(event){
    //  var style2 = dropdown2.value != " " ? 'none' : 'block';
    //  document.getElementById("aha1").style.display = style2;
    // }

    // document.getElementById('button').onclick = function($tgl1,$tgl2,$aksi_kasir) {
    //     $('#konten_uangmuka').load('<?php echo site_url('laporan/akunting_action/data_by_sistem/'.$tgl1.'/'.$tgl2.'/'.$ruang_rawat.'')?>');
    // };


    /*
     * ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
     *  TARO ACTION CONTROLLER DI BAWAH INI, DIATAS BUAT PLUGIN PLUGIN JQUERY/ JS LAENNYA YANG DIPAKE OKEH BEROH.........................
     * //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     */

     function data_sistem() 
     {
      $.ajax({
        type: "POST",
        // url: "<?= site_url('laporan/akunting_action/data_by_sistem/')?>",
        url: BASEURL+'/laporan/akunting_action/data_by_sistem/',
        cache: false,
        dataType: "html",              
        data: $('#form_search').serialize(),
        success: function(url){
          $('#konten_uangmuka').html(url); 
                // $('#konten_uangmuka').load('<?php echo site_url('laporan/akunting_action/data_by_sistem/'.$tgl1.'/'.tgl2.'/'.$aksi_kasir.'')?>');     
              }
            });
    }

    function data_visa_by_sistem() 
    {
      $.ajax({
        type: "POST",
        // url: "<?= site_url('laporan/akunting_action/data_visa_by_sistem')?>",
        url: BASEURL+'/laporan/akunting_action/data_visa_by_sistem/',
        cache: false,
        dataType: "html",              
        data: $('#form_search').serialize(),
        success: function(url){
          $('#konten_visapasien').html(url); 
                // $('#konten_uangmuka').load('<?php echo site_url('laporan/akunting_action/data_by_sistem/'.$tgl1.'/'.tgl2.'/'.$aksi_kasir.'')?>');     
              }
            });
    }

    function data_karcis_by_sistem() 
    {
      $.ajax({
        type: "POST",
        // url: "<?= site_url('laporan/akunting_action/data_visa_by_sistem')?>",
        url: BASEURL+'/laporan/akunting_action/data_karcis_by_sistem/',
        cache: false,
        dataType: "html",              
        data: $('#form_karcis').serialize(),
        success: function(url){
          $('#konten_karcispasien').html(url); 
                // $('#konten_uangmuka').load('<?php echo site_url('laporan/akunting_action/data_by_sistem/'.$tgl1.'/'.tgl2.'/'.$aksi_kasir.'')?>');     
              }
            });
    }


    function update_tanggal()
    {
     // $('.load_tindakan').show();
     $.ajax({
       // url: "<?php echo site_url('laporan/akunting_action/validasi_by_bendahara')?>",
       url: BASEURL+"/laporan/akunting_action/validasi_by_bendahara/",
       type: "POST",
       dataType: "json",
       data: $('#form_search').serializeArray(),
       success: function() {
              // $('#konten').load('<?php echo site_url('laporan/akunting_action/data_by_bendahara/'.$tgl1.'/'.$tgl2.'/'.$aksi_kasir.'')?>');
              // $('.load_tindakan').hide();
            }
          // error: function(){
          //    alert('Lengkapi data')
          //    $('.load_tindakan').hide();
          //   }
        });
   }