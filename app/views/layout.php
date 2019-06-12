<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>INFORMASI TEMPAT TIDUR RUANGAN</title>

  <?php 
  $css = array(
    'bootstrap.css','sweetalert.css','infobed.css'
    // ,'jquery.mobile-1.3.2.min.css'
    );
  $js = array(
    'jquery-1.7.2.js','bootstrap.min.js','sweetalert-dev.js'
    // ,'jquery.mobile-1.3.2.min.js'
    );
    ?>
    <?= css_asset($css); ?>
    <?= js_asset($js); ?>
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top kepala" style="height:90px;">
      <div style="float:left;"><?php echo img_asset('logo_dd_sayang_mamah.png', array('onClick'=>'toggleFullScreen();','height'=>'80','style'=>'margin-top:1px')); ?></div>
      <div style="float:right;"><?php echo img_asset('logo_dd_sayang_papah.png', array('onClick'=>'toggleFullScreen();','height'=>'80','style'=>'margin-top:1px; margin-right:20px;')); ?></div>
      <div style="margin-top:5px;">
        <center><font size="+3" color="#ED7F09">INFORMASI TEMPAT TIDUR RUANGAN</font></center>
        <div style="margin-top:5px;"></div>
        <center><font size="+2" color="#ED7F09">RSUP PERSAHABATAN</font></center>
      </div>
      <div style="margin-bottom:5px;"></div>
    </nav>

    <div id="background_cycler" >
      <script type="text/javascript">
      $('#background_cycler').hide();//comment
    </script>
    <?php 
      $image1 = BASEURL.('/assets/img/image1.jpg');
      $image2 = BASEURL.('/assets/img/image2.jpg');
      $image3 = BASEURL.('/assets/img/image3.jpg');
      $image4 = BASEURL.('/assets/img/image4.jpg');
      $image5 = BASEURL.('/assets/img/image5.jpg');
    ?>
    <div class="active" style="background-image:url(<?php echo $image1; ?>)"></div>
    <div style="background-image:url(<?php echo $image2; ?>)"></div>
    <div style="background-image:url(<?php echo $image3; ?>)"></div>
    <div style="background-image:url(<?php echo $image4; ?>)"></div>
    <div style="background-image:url(<?php echo $image5; ?>)"></div>
  </div>

  <!-- Begin page content -->
  <div id="outer_wrap">
  <!-- <div class="container-fluid"> -->
    <hr style="visibility:hidden; margin-bottom:10px;" />

    <?php $this->load->view($view);?>

    <?php //echo $flashMessage; ?>
    <?php //echo $layout_content; ?>
    
  <!-- </div> -->
  </div>
  <footer class="footer">
    <div style="float:left; width:80%; margin-top:6px;">
    <div id="marquee">
      <?php echo img_asset('logo_dd_sayang_papah.png', array('height'=>'15','style'=>'margin-top:2px; margin-right:5px;')); ?>
      <font color="#ED7F09">SELAMAT DATANG DI RSUP PERSAHABATAN </font>
      <?php echo img_asset('logo_dd_sayang_papah.png', array('height'=>'15','style'=>'margin-top:2px; margin-right:5px;')); ?>
      <font color="#ED7F09">Info Online : www.rsuppersahabatan.co.id</font>
      <?php echo img_asset('logo_dd_sayang_papah.png', array('height'=>'15','style'=>'margin-top:2px; margin-right:5px;')); ?>
      <font color="#ED7F09">Untuk Informasi kamar selengkapnya silahkan hubungi admision</font>
      <?php echo img_asset('logo_dd_sayang_papah.png', array('height'=>'15','style'=>'margin-top:2px; margin-right:5px;')); ?>
      <font color="#ED7F09">UNTUK INFORMASI HUMAS : 0878-800-700-39 </font>
      <?php //echo img_asset('logo_dd_sayang_papah.png', array('height'=>'15','style'=>'margin-right:5px; margin-top:2px;')); ?>
    </div>
    </div>
    <div style="float:right; width:20%; font-size:18px; color:#ED7F09; margin-top:6px;"><center><span id="tgl"></span>&nbsp;&nbsp;&nbsp;<span id="clock"></span></center></div>
  </footer>
</body>
</html>
