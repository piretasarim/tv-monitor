<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" id="load">
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Metro, a sleek, intuitive, and powerful framework for faster and easier web development for Windows Metro Style.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, metro, front-end, frontend, web development">
    <meta name="author" content="Sergey Pimenov and Metro UI CSS contributors">

    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
    <title>Monitoring Ekspedisi RSUP Persahabatans</title>

<?php 
  $css = array(
    'metro.css','metro-icons.css','metro-responsive.css','metro-schemes.css','circle.css'
  );
  $js = array(
    'jquery-2.1.3.min.js','metro.js','pie-chart.js'
  );
?>

    <?= css_asset_docs($css); ?>
    <?= js_asset_docs($js); ?>
    
<?php 
// $image6 = BASEURL.('/assets/docs/images/tes.jpg');
$image6 = '';
?>

<style type="text/css">
  html { 
  /* background: url(<?php echo $image6; ?>) no-repeat center center fixed;  */
  background-color: #000000;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

table.table tr td {
  color: #FFF;
}

table.table tr th {
  color: #FFF;
}

h5.judul {
  color: #FFF;
}

.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  background-color: #0072c6;
}

</style>
<style>
    
.pie-title-center {
  display: inline-block;
  position: relative;
  text-align: center;
}

.pie-value {
  display: block;
  position: absolute;
  font-size: 35px;
  height: 40px;
  top: 50%;
  left: 0;
  right: 0;
  margin-top: -20px;
  line-height: 40px;
}

</style>
<style>
#circle {
  margin: 10px;
}
#submit {
  cursor: pointer;
  font-weight: bold;
  float: right;
  color: #90c844;
}
</style>
</head>
<body>
  <?php $this->load->view($view);?>
</body>
</html>