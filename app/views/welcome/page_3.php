

<!-- TODO: https://jsfiddle.net/shailesh_sal/o0s2ugap/1/ -->
<style>

/* DivTable.com */
/* .divTable{
	display: table;
	width: 100%;
}
.divTableRow {
    display: table-row;
    color: #000;
}
.divTableHeading {
	background-color: #000;
	display: table-header-group;
}
.divTableCell, .divTableHead {
	border: 1px solid #999999;
	display: table-cell;
	padding: 3px 10px;
}
.divTableHeading {
	background-color: #EEE;
	display: table-header-group;
	font-weight: bold;
}
.divTableFoot {
	background-color: #EEE;
	display: table-footer-group;
	font-weight: bold;
}
.divTableBody {
	display: table-row-group;
}

.divTableRow:nth-child(even) {
  background-color: #F2F2F2;
}

.divTableRow:nth-child(odd) {
  color: #F2F2F2;
}

@media screen and (max-width: 600px) {

    .divTable {
      border: 0;
    }

    .divTableCell, .divTableHead {
        border: 0px;
    }
    .divTableRow {
        border: 1px solid #ddd;
    }
    .divTable > .divTableHeading {
        display: none;
    }

    .divTable  .divTableRow {
        margin-bottom: 10px;
        display: block;
        border-bottom: 2px solid #ddd;
    }

    .divTable .divTableCell {
        display: block;
        text-align: right;
        font-size: 13px;
        border:1px;
        border-bottom: 1px dotted #CCC;
    }

    .divTable .divTableCell:last-child {
        border-bottom: 0;
    }

    .divTable .divTableCell:before {
        content: attr(data-label);
        float: left;
        text-transform: uppercase;
        font-weight: bold;

    }
} */

.table.striped tbody tr:nth-child(even) {
    font-size: 10px;
}

.table.striped tbody tr:nth-child(odd) {
    background: #aba0a0;
    font-size: 12px;
}

</style>

<?php //dump($data); ?>

<div>
  <header class="app-bar fixed-top" data-role="appbar">
    <div class="container">
    <div class="clearfix"></div>
      <div style="background-color:#0072c6;">
        <div class="window-caption-title" style="font-size:40px; width:100%;">
          <center>TV MONITORING RSUP PERSAHABATAN</center>
        </div>
      </div>
    </div>
  </header>
</div>

<div class="container page-content" style="width:100%; padding-top:35px;">
  <div class="grid"> 
  <div class="row cells12">
      <div class="cell colspan6 debug">
      <h5 class="judul">BLOK RAK 00-09</h5>
      <table class="table border bordered hovered striped cell-hovered" id="main_table_demo">
          <thead>
          <tr>
              <th>No</th>
              <th>No RM</th>
              <th>Nama Pasien</th>
              <th>Poli</th>
              <th>Dokter</th>
              <th>Jam Register</th>
              <th>No Antri</th>
              <th>Status</th>
          </tr>
          </thead>
          <tbody>
            <?php 
                foreach ($data as $key => $value) {
            ?>
                <tr>
                    <td><?=$key+1?></td>
                    <td id="no_rm<?=$value->no_rm;?>"><?=$value->no_rm?></td>
                    <td id="nama_pasien<?=$value->no_rm;?>"><?=$value->nama_pasien?></td>
                    <td id="nama_poli<?=$value->no_rm;?>"><?=$value->nama_poli?></td>
                    <td id="nama_dokter<?=$value->no_rm;?>"><?=$value->nama_dokter?></td>
                    <td id="jam_kunjungan<?=$value->no_rm;?>"><?=$value->jam_kunjungan?></td>
                    <td id="no_urut<?=$value->no_rm;?>"><?=$value->no_urut?></td>
                    <td id="status_berkas<?=$value->no_rm;?>">
                        <input type="hidden" id="status_berkas_warna<?=$value->no_rm;?>" value="<?=$value->kode_status_berkas;?>" />
                        <?=$value->status_berkas?>
                    </td>
                </tr>
            <?php
                }
            ?>
          </tbody>
      </table>
      </div>
      <div class="cell colspan6 debug">
      <h5 class="judul">BLOK RAK 10-19</h5>
      <table>
          <thead>
          <tr>
              <th>No</th>
              <th>No RM</th>
              <th>Nama Pasien</th>
              <th>Poli</th>
              <th>Dokter</th>
              <th>Jam Register</th>
              <th>No Antri</th>
              <th>Status</th>
          </tr>
          </thead>
          <tbody>
          <tr>
              <td>1</td>
              <td>2416887</td>
              <td>SHERLY TANU WIJAYA</td>
              <td>Bedah (GP)</td>
              <td>dr. Sigit Daru Cahayadi, Sp.OT</td>
              <td>06:22:00</td>
              <td>1</td>
              <td>Daftar</td>
          </tr>
          <tr>
          <td>2</td>
              <td>2501932</td>
              <td>ARIEF TEGUH SUTRISNO</td>
              <td>Paru (GP)</td>
              <td>dr. Elisna Syahrudin, PhD, Sp.P(K)</td>
              <td>06:56:00</td>
              <td>2</td>
              <td>Distribusi</td>
          </tr>
          <tr>
          <td>3</td>
              <td>2504022</td>
              <td>DINDIN ENDIYANI</td>
              <td>Paru (GP)</td>
              <td>dr. Elisna Syahrudin, PhD, Sp.P(K)	</td>
              <td>06:57:00</td>
              <td>3</td>
              <td>Daftar</td>
          </tr>
          <tr>
          <td>4</td>
              <td>2074165</td>
              <td>LINA MEGAWATI TOBING</td>
              <td>Kardiologi (GP)</td>
              <td>dr. R. Iwang Gumiwang, Sp.PD, Sp.JP</td>
              <td>07:45:00</td>
              <td>4</td>
              <td>Daftar</td>
          </tr>
          <tr>
          <td>5</td>
              <td>1415398</td>
              <td>DEMINA SAGALA, NY	</td>
              <td>Kardiologi (GP)</td>
              <td>dr. R. Iwang Gumiwang, Sp.PD, Sp.JP</td>
              <td>08:30</td>
              <td>5</td>
              <td>Selesai Dokter</td>
          </tr>
          <tr>
          <td>6</td>
              <td>1399267</td>
              <td>DEWANTARA ANANTO NUGROHO, An</td>
              <td>Mata (GP)</td>
              <td>dr. Andito Keshavamurthi Adisasmito, Sp.M	</td>
              <td>08:25</td>
              <td>6</td>
              <td>Daftar</td>
          </tr>
          </tbody>
      </table>
      </div>
  </div>

  <div class="row cells12">
      <div class="cell colspan6 debug">
      <h5 class="judul">BLOK RAK 20-29</h5>
      <table>
          <thead>
          <tr>
              <th>No</th>
              <th>No RM</th>
              <th>Nama Pasien</th>
              <th>Poli</th>
              <th>Dokter</th>
              <th>Jam Register</th>
              <th>No Antri</th>
              <th>Status</th>
          </tr>
          </thead>
          <tbody>
          <tr>
              <td>1</td>
              <td>2416887</td>
              <td>SHERLY TANU WIJAYA</td>
              <td>Bedah (GP)</td>
              <td>dr. Sigit Daru Cahayadi, Sp.OT</td>
              <td>06:22:00</td>
              <td>1</td>
              <td>Daftar</td>
          </tr>
          <tr>
          <td>2</td>
              <td>2501932</td>
              <td>ARIEF TEGUH SUTRISNO</td>
              <td>Paru (GP)</td>
              <td>dr. Elisna Syahrudin, PhD, Sp.P(K)</td>
              <td>06:56:00</td>
              <td>2</td>
              <td>Distribusi</td>
          </tr>
          <tr>
          <td>3</td>
              <td>2504022</td>
              <td>DINDIN ENDIYANI</td>
              <td>Paru (GP)</td>
              <td>dr. Elisna Syahrudin, PhD, Sp.P(K)	</td>
              <td>06:57:00</td>
              <td>3</td>
              <td>Daftar</td>
          </tr>
          <tr>
          <td>4</td>
              <td>2074165</td>
              <td>LINA MEGAWATI TOBING</td>
              <td>Kardiologi (GP)</td>
              <td>dr. R. Iwang Gumiwang, Sp.PD, Sp.JP</td>
              <td>07:45:00</td>
              <td>4</td>
              <td>Daftar</td>
          </tr>
          <tr>
          <td>5</td>
              <td>1415398</td>
              <td>DEMINA SAGALA, NY	</td>
              <td>Kardiologi (GP)</td>
              <td>dr. R. Iwang Gumiwang, Sp.PD, Sp.JP</td>
              <td>08:30</td>
              <td>5</td>
              <td>Selesai Dokter</td>
          </tr>
          <tr>
          <td>6</td>
              <td>1399267</td>
              <td>DEWANTARA ANANTO NUGROHO, An</td>
              <td>Mata (GP)</td>
              <td>dr. Andito Keshavamurthi Adisasmito, Sp.M	</td>
              <td>08:25</td>
              <td>6</td>
              <td>Daftar</td>
          </tr>
          </tbody>
      </table>
      </div>
      <div class="cell colspan6 debug">
      <h5 class="judul">JUDUL</h5>

      </div>
  </div>

  </div> <!-- end grid -->
</div>

<!-- LOAD OUR JS -->
<?php $this->load->view('welcome/tvmonitor');?>

<div class="footer">
<footer class="container-fluid p-4">
    <div class="row" style="width:100%;background-color:#0072c6;>
        <div class="cell-md-12" style="float:right; background-color:#0072c6;">
          <h5><center><span id="tgl" style="color:#FFF;"></span>&nbsp;&nbsp;&nbsp;<span id="clock" style="color:#FFF;"></span></center></h5>
          <!-- <input type="hidden" id="diam" value="0">  -->
          <!-- <span Onclick="fungsi('off')" id="off_span" style="cursor:pointer;"> -->
          <!-- <img src="<?php //echo base_url('assets/img/pause.png') ?>" height="25" width="25" style="padding-bottom:1px;"> -->
          </span>
          <!-- <span Onclick="fungsi('on')" id="on_span" style="cursor:pointer; display:none;"> -->
          <!-- <img src="<?php //echo base_url('assets/img/play.png') ?>" height="28" width="28" style="padding-bottom:0px;"> -->
          </span>
        </div>
    </div>
</footer>
</div>