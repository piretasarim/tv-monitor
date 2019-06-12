	<?php //dump($data);?>
	<!-- <div id="main_content"></div> -->
	<div class="col-xs-12 col-sm-4">
		<div class="box">
			<div class="box-content">
				<div class="box box-pricing">
					<div class="box-name">						
						<table class="table table-bordered table-striped table-striped-column">
							<thead><tr class="highlight"><th>Kelas</th><th>Kapasitas</th><th>Isi</th><th>Kosong</th></tr></thead>
							<tbody>
							<?php  
								for ( $i=0; $i<16; $i++)
								{  
							?>
								<tr><td><strong><?=$data[$i]->nama_ruang?></strong></td><td id="kapasitas<?=$i?>"></td><td id="terisi<?=$i?>"></td><td id="kosong<?=$i?>"></td></tr>
							
							<?php } ?>
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-4">
		<div class="box">
			<div class="box-content">
				<div class="box box-pricing">
					<div class="box-name">

						<table class="table table-bordered table-striped table-striped-column">
							<thead><tr class="highlight"><th>Kelas</th><th>Kapasitas</th><th>Isi</th><th>Kosong</th></tr></thead>
							<tbody>
							<?php  
								for ( $j=16; $j<29; $j++)
								{  
							?>
								<tr><td><strong><?=$data[$j]->nama_ruang?></strong></td><td id="kapasitas<?=$j?>"></td><td id="terisi<?=$j?>"></td><td id="kosong<?=$j?>"></td></tr>
							
							<?php } ?>
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-4">
		<div class="box">
			<div class="box-content">
				<div class="box box-pricing">
					<div class="box-name">
						<table class="table table-bordered table-striped table-striped-column">
							<thead><tr class="highlight"><th>Kelas</th><th>Kapasitas</th><th>Isi</th><th>Kosong</th></tr></thead>
							<tbody>
							<?php  
								for ( $k=29; $k<48; $k++)
								{  
							?>
								<tr><center><td><strong><?=$data[$k]->nama_ruang?></strong></td><td id="kapasitas<?=$k?>"></td><td id="terisi<?=$k?>"></td><td id="kosong<?=$k?>"></td></center></tr>
							
							<?php } ?>
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>

  <!-- LOAD OUR JS -->
  <?php $this->load->view('welcome/infobed');?>

	<script type="text/javascript">
	$(document).ready(function() {
	     setInterval(function() {
	     var BASEURL = '<?= BASEURL?>';
	     // window.location.href = BASEURL+'/welcome/page_dua';
	     window.location.href = BASEURL+'/halaman/dua';

	   }, 30000);
	});
	</script>