$('#tgl1').datepicker({"format": "dd-mm-yyyy", "weekStart": 1, "autoclose": true});
$('#tgl2').datepicker({"format": "dd-mm-yyyy", "weekStart": 1, "autoclose": true});

    // $(document).ready(function () {
    //     $("#btnExport").click(function () {
    //         $("#tblExport").btechco_excelexport({
    //             containerid: "tblExport"
    //            , datatype: $datatype.Table
    //         });
    //     });
    // });

$("#eks").click(function () {

    var m_names = new Array("Januari", "Februari", "Maret", 
        "April", "Mei", "Juni", "Juli", "Agustus", "September", 
        "Oktober", "November", "Desember");

    var Name = 'Laporan-indeks-pasien-';
    var d = new Date();
    var curr_date = d.getDate();
    var curr_month = d.getMonth();
    var curr_year = d.getFullYear();
    var blobURL = tableToExcel('tblExport');
    $(this).attr('download',Name+curr_date + "-" + m_names[curr_month]+ "-" + curr_year+'.xls')
    $(this).attr('href',blobURL);
});

  // source: http://stackoverflow.com/a/16016019
  var dropdown = document.getElementsByName("jenis_kode")[0];
  dropdown.onchange = function(event){
        if(dropdown.value == 'sekunder') { // alert('semua');
            // var style = (dropdown.value == 'semua' || dropdown.value == 'sekunder') ? 'visible' : 'hidden';
            document.getElementById("aha").style.visibility = "visible";
        }else if(dropdown.value == 'utama') {
            document.getElementById("aha").style.visibility = "visible";
        }else{
            document.getElementById("aha").style.visibility = "hidden";
        }
     }

function printData()
    {
        //source: http://stackoverflow.com/a/24577622
        var divToPrint=document.getElementsByClassName("print")[0];
        var htmlToPrint = '' +
            '<style type="text/css">' +
            'table th, table td {' +
            'font-family: verdana,arial,sans-serif;' +
            'border:1px solid #000;' +
            'padding;0.5em;' +
            'border-style: solid;' +
            'border-color: #666666;' +
            'width: 50%;' +
            'max-width: 70px;' +
            'min-width: 50px;' +
            '}' +
            '</style>';
         htmlToPrint += divToPrint.outerHTML;
         newWin= window.open("");
         newWin.document.write(htmlToPrint);
       //newWin.document.write(divToPrint.outerHTML);
       newWin.print();
       newWin.close();
    }
    $('#print').on('click',function(){
        printData();
    });

function cari_diagnosa()
     {
        $('#aha').typeahead({
            source: function(typeahead, query) {
                $.ajax({
                    // url: "<?php echo site_url('pemetaandiagnosa/typeahead');?>",
                    url: BASEURL+'/pemetaandiagnosa/typeahead',
                    dataType: "json",
                    type: "POST",
                    data: {
                        max_rows: 15,
                        q: query,
                    },
                    success: function(data) {
                        var return_list = [], i = data.length;
                        while (i--) {
                            return_list[i] = {id: data[i].id, value: data[i].kode + ' - ' + data[i].topik, KD_ICD10: data[i].kode, topik:data[i].topik};
                        }
                        typeahead.process(return_list);
                    }
                });
            },
            onselect: function(obj) {
                $('#diagnosa').val(obj.id);
                // $('#diagnosa').val(obj.value);
            },
            items: 15
        });
     }

function cari_pasien()
{
    $('#nama_pasien').typeahead({
        source: function(typeahead, query) {
           $.ajax({
              // url: "<?php echo site_url('master/pasien/typeahead');?>",
              url: BASEURL+'/master/pasien/typeahead',
              dataType: "json",
              type: "POST",
              data: {
                  max_rows: 15,
                  q: query,
              },
              success: function(data) {
                  var return_list = [], i = data.length;
                  while (i--) {
                      return_list[i] = { id: data[i].id, 
                                      value: data[i].no_rm + ' - ' + data[i].nama, 
                                      no_rm: data[i].no_rm,
                                       nama: data[i].nama
                    };
                  }
                  typeahead.process(return_list);
              }
           });
        },
        onselect: function(obj) {
            $('#no_rm_ibu').val(obj.no_rm);
            $('#nama_pasien').val(obj.nama);
        },
    items: 15
    });
}

// --------------------------------------------
// Taro fungsi untuk mengluarkan data disini aja
// --------------------------------------------

function data_rekap_indeks_pasien() 
{
    $('#img').show();
          
    var tanggal1 = $('#tgl1').val();
    var tanggal2 = $('#tgl2').val();
    var kode = $('#kode').val();
    var diag = $('#diag').val();
    var jenk = $('#jenk').val();
    var stat = $('#stat').val();
    var smf = $('#smf').val();

    $.ajax({
        type: "POST",
        url: BASEURL+'/indeksaction/data_rekap_indeks/pasien/',
        cache: false,
        dataType: "html",              
        data: $('#form_search').serialize(),
        success: function(url){
          $('#img').hide();
          $('#konten_indekspasien').html(url);
        }
    });
}

function data_rekap_indeks_bayi() 
{
    $('#img').show();
    $.ajax({
        type: "POST",
        url: BASEURL+'/indeksaction/data_rekap_indeks/bayi/',
        cache: false,
        dataType: "html",              
        data: $('#form_search').serialize(),
        success: function(url){
          $('#img').hide();
          $('#konten_indekspasienbayi').html(url); 
        }
    });
}