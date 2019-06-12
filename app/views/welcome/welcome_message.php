<p>
    <div class="box-content"> 
      <div class="load_book" style="z-index:9999; height:92%; width:96%;  position:absolute; display:none; background-color:#FFF; opacity:0.6;">
        <div style="position:absolute; top:50%; left:50%;"><img src="<?php echo site_url('assets/img/'); ?>/progress.gif" /></div>
    </div>
    <form class="form-horizontal form1" role="form" method="post" id="home">

        <h4 class="page-header">LIST PASIEN</h4>
        <table class="table table-bordered" style="font-size:12px;">
            <thead>
                <tr>
                    <td colspan="14"><center><b>STATUS PASIEN AKTIF</b></center></td>
                </tr>
                <tr>
                    <td rowspan="2"><center>NO</center></td>
                    <td colspan="2"><center>NOMOR</center></td>
                    <td rowspan="2"><center>NAMA PASIEN</center></td>
                    <td rowspan="2"><center>NAMA INSTALASI</center></td>
                    <td rowspan="2"><center>NAMA POLI</center></td>
                    <td rowspan="2"><center>NAMA RUANG</center></td>
                    <td rowspan="2"><center>NAMA DOKTER</center></td>
                    <td colspan="4"><center>WAKTU</center></td>
                    <!-- <td rowspan="2">ACTION</td> -->
                </tr>
                <tr>
                    <td><center>REG</center></td>
                    <td><center>RM</center></td>
                    <td><center><b>Daftar</b></center></td>
                    <td><center><b><font color="GoldenRod">Ditemukan</font></b></center></td>
                    <td><center><b><font color="#5AB95A">Distribusi</font></b></center></td>
                    <td><center><b><font color="Sienna">Dikembalikan</font></b></center></td>
                </tr>
            </thead>
            <tbody id="konten_book">

            </tbody>
        </table>
<!--     <div class="form-group">
            <div class="col-sm-12">
                <span style="float:right;">
                <button type="button" onclick="save_tabel_2()" class="btn btn-primary btn-app-sm btn-circle">Process</button></span>
                <div class="clearfix"></div>
            </div>
        </div> -->
    </form>
</div>
</p>
