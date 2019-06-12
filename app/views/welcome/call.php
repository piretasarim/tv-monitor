<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INFORMASI TEMPAT TIDUR RUANGAN</title>
<?php 
$css = array(
  'bootstrap.css','style.css','main.css','bootstrap-datetimepicker.css','sweetalert.css'
  );

  // Put your js here!
$js = array(
  'jquery-1.7.2.js','bootstrap.min.js','bootstrap-datetimepicker.js','sweetalert-dev.js','bootstrap-typeahead.js','jquery.hotkeys.js'
  );
  ?>
?>
<link rel="stylesheet" href="jquery.mobile-1.3.2.min.css">
<script src="jquery-1.7.2.min.js"></script>
<script src="jquery.mobile-1.3.2.min.js"></script>
</head>

<body onload="showTime()" bgcolor="#FFFFFF">
  <div data-role="page" id="pageone">
  <div data-role="header" data-theme="b" style="height:80px;">
    <div style="float:left;"><img src="logo-depkes.png" height="80" style="margin-top:1px;" onclick="toggleFullScreen();" /></div>
    <div style="float:right;"><img src="logo_d.png" height="80" style="margin-top:1px; margin-right:50px;" /></div>
    <div style="margin-top:5px;">
      <center><font size="+3">INFORMASI TEMPAT TIDUR RUANGAN</font></center>
      <div style="margin-top:5px;"></div>
      <center><font size="+2">RSUP PERSAHABATAN</font></center>
    </div>
    <div style="margin-bottom:5px;"></div>
  </div>

  <div data-role="main" class="ui-content" style="padding:0px;">
    <div id="dialog" style="z-index:9999; position:fixed; margin-top:60px; width:100%; height:50%;"><center><img src="ajax-loader.gif" /></center></div>
    <div id="isi_data"></div>
  </div>

  <div data-role="footer" data-theme="b" style="height:40px;">
     <div style="margin-top:3px;">
      <div style="float:left; width:80%; margin-top:6px;"><marquee scrolldelay="200">
      <img src="logo_d.png" height="15" style="margin-top:2px; margin-right:5px;" /> 
      SELAMAT DATANG DI RSUP PERSAHABATAN 
      <img src="logo_d.png" height="15" style="margin-top:2px; margin-right:5px;" /> 
      Info Online : www.rsuppersahabatan.co.id
      <img src="logo_d.png" height="15" style="margin-top:2px; margin-right:5px;" /> 
      Untuk Informasi kamar selengkapnya silahkan hubungi admision
      <img src="logo_d.png" height="15" style="margin-top:2px; margin-right:5px;" /> 
      UNTUK INFORMASI HUMAS : 0812-1000-1000 <img src="logo_d.png" height="15" style="margin-top:2px; margin-right:5px;" />
      </marquee></div>
      <div style="float:right; width:20%; font-size:18px; margin-top:6px;"><center>04 - Dec - 2015&nbsp;&nbsp;&nbsp;<span id="clock"></span></center></div>
      <div style="clear:both"></div>
    </div>
  </div>
</div>

<!-- tutup dialog -->

<script type="text/javascript">
//   $(document).ready(function(e) {
//     $('#isi_data').load('data_xml.php')
// });
</script> 

</body>
</html>