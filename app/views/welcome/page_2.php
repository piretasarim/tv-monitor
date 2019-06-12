     <?php //dump($data);?>
     <div class="grid">
       <div class="cell" style="margin-bottom:10px;">
        <div class="window">
          <div class="window-caption bg-cyan">
           <div class="window-caption-title" style="color:#FFF; font-size:40px;  border:0px solid #000; width:100%;">
            <center>INFORMASI KETERSEDIAAN TEMPAT TIDUR <br>RSUP PERSAHABATAN</center>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="cell">
        <div data-controls="false" data-markers="false" data-effect="fade">
          <div class="slide padding5">
            <div class="row cells4">
              <?php for($i=0; $i<4; $i++){ //dump($data[$i]); ?>
              <div class="cell">
                <div class="window">
                  <div class="window-caption bg-cyan">
                   <div class="window-caption-title" style="color:#FFF; font-size:20px;  border:0px solid #000; width:100%;">
                   <center><?php echo $data[$i]->NAMA_KELAS; ?></center>
                  </div>

                </div>
                <div class="window-content" style="padding:15px;" >
                  <center>
                    <div style="border:1px solid #1BA1E2;width:110px;height:110px; 
                    border-radius:100px;background:#1BA1E2;">
                    <div style="margin:auto; padding-top:20px; padding-left:2px;" >
                      <b><span style="font-size:55px; color:#FFF;"> 
                        <?php 
                        echo ($data[$i]->bed_sk - $data[$i]->ISI);  
                        ?></span> </b>&nbsp;
                      </div>

                    </div>
                  </center>
                  <hr>
                  <center>
                  <a class="image-button bg-cyan bg-active-amber fg-white icon-right small-button" style="height:45px;">
                        <div style="font-size:45px; color:#FFF; padding-top:5px;"><b>
                          <?php 
                            $array = explode(',', $data[$i]->ISI_KELAMIN);
                            // print_r($array);
                            $counts = array_count_values($array);
                            if(!empty($counts['L']))
                              echo $counts['L'];
                            else
                              echo 0;
                           ?>
                        </b>&nbsp;&nbsp;</div>
                        <img class="icon bg-darkCyan" src="<?php echo base_url('assets/img/male.png') ?>" style="height:45px; width:45px;">
                    </a>
                    <a class="image-button bg-pink bg-active-amber fg-white icon-right small-button" style="height:45px;">
                        <div style="font-size:45px; color:#FFF; padding-top:5px;"><b>
                          <?php 
                            if(!empty($counts['P']))
                              echo $counts['P'];
                            else
                              echo 0; 
                            ?>
                        </b>&nbsp;&nbsp;</div>
                        <img class="icon bg-darkPink" src="<?php echo base_url('assets/img/female.png') ?>" style="height:45px; width:45px;">
                    </a>
                  <!--
                    <a class="image-button bg-cyan bg-active-amber fg-white icon-right small-button" style="height:45px;">
                      <div style="font-size:45px; color:#FFF; padding-top:5px;"><b><?php //echo ($data[$i]->ISI_L) ?></b>&nbsp;&nbsp;</div>
                      <img class="icon bg-darkCyan" src="http://192.168.132.4/info/docs/images/male.png" style="height:45px; width:45px;">
                    </a>
                    <a class="image-button bg-pink bg-active-amber fg-white icon-right small-button" style="height:45px;">
                      <div style="font-size:45px; color:#FFF; padding-top:5px;"><b><?php //echo ($data[$i]->ISI_P) ?></b>&nbsp;&nbsp;</div>
                      <img class="icon bg-darkPink" src="http://192.168.132.4/info/docs/images/female.png" style="height:45px; width:45px;">
                    </a>
                  -->
                  </center>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>

          <div class="row cells4">

            <div class="cell">
              <div class="window">
                <div class="window-caption bg-cyan">
                 <div class="window-caption-title" style="color:#FFF; font-size:20px; border:0px solid #000; width:100%;">
                  <center><?php echo $data[5]->NAMA_KELAS ?></center>
                </div>
                                                <!--<span class="btn-min"></span>
                                                <span class="btn-max"></span>
                                                <span class="btn-close"></span>-->
                                              </div>
                                              <div class="window-content" style="padding:15px;" >
                                                <center>
                                                  <div style="border:1px solid #1BA1E2;width:110px;height:110px; 
                                                  border-radius:100px;background:#1BA1E2;">
                                                  <div style="margin:auto; padding-top:20px; padding-left:2px;" >
                                                    <b><span style="font-size:55px; color:#FFF;"> 
                                                      <?php 
                                                      // echo ($data[8]['ISI_L'] + $data[8]['ISI_P']) ;
                                                      // echo $data[5]->KOSONG;
                                                      $kosongs = $data[5]->bed_sk - $data[5]->ISI;
                                                      if($kosongs < 0)
                                                        $kosongs = 0;
                                                      else
                                                        $kosongs = $kosongs;

                                                      echo ($kosongs);  

                                                      ?></span> </b>&nbsp;
                                                    </div>
                                                    
                                                  </div>
                                                </center>
                                                <hr>
                                                <center>
                                                <a class="image-button bg-cyan bg-active-amber fg-white icon-right small-button" style="height:45px;">
                                                <div style="font-size:45px; color:#FFF; padding-top:5px;"><b>
                                                  <?php 
                                                    $array = explode(',', $data[5]->ISI_KELAMIN);
                                                    // print_r($array);
                                                    $counts = array_count_values($array);
                                                    if(!empty($counts['L']))
                                                      echo $counts['L'];
                                                    else
                                                      echo 0;
                                                   ?>
                                                </b>&nbsp;&nbsp;</div>
                                                <img class="icon bg-darkCyan" src="<?php echo base_url('assets/img/male.png') ?>" style="height:45px; width:45px;">
                                                </a>
                                                <a class="image-button bg-pink bg-active-amber fg-white icon-right small-button" style="height:45px;">
                                                <div style="font-size:45px; color:#FFF; padding-top:5px;"><b>
                                                  <?php 
                                                    if(!empty($counts['P']))
                                                      echo $counts['P'];
                                                    else
                                                      echo 0; 
                                                    ?>
                                                </b>&nbsp;&nbsp;</div>
                                                <img class="icon bg-darkPink" src="<?php echo base_url('assets/img/female.png') ?>" style="height:45px; width:45px;">
                                                </a>
                                                <!--  
                                                  <a class="image-button bg-cyan bg-active-amber fg-white icon-right small-button" style="height:45px;">
                                                    <div style="font-size:45px; color:#FFF; padding-top:5px;"><b><?php //echo ($data[5]->ISI_L) ?></b>&nbsp;&nbsp;</div>
                                                    <img class="icon bg-darkCyan" src="http://192.168.132.4/info/docs/images/male.png" style="height:45px; width:45px;">
                                                  </a>
                                                  <a class="image-button bg-pink bg-active-amber fg-white icon-right small-button" style="height:45px;">
                                                    <div style="font-size:45px; color:#FFF; padding-top:5px;"><b><?php //echo ($data[5]->ISI_P) ?></b>&nbsp;&nbsp;</div>
                                                    <img class="icon bg-darkPink" src="http://192.168.132.4/info/docs/images/female.png" style="height:45px; width:45px;">
                                                  </a>
                                                -->
                                                </center>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="cell colspan2">
                                            <div class="window">
                                              <div class="window-caption bg-cyan">
                                                <div class="window-caption-title" style="color:#FFF; font-size:20px;  border:0px solid #000; width:100%;">
                                                  <center>Tingkat Hunian Tempat Tidur Hari Ini</center>
                                                </div>

                                              </div>
                                              <div class="window-content" style="padding:15px;" >
                                                <?php
                                                  // $isi = $kueh->data_isi; 
                                                  // $total = $kueh->data_isi + $kueh->data_iddle + $kueh->data_kosong;
                                                  // $p = (($isi/$total)*100);

                                                  $jml_bed_sk = 0;
                                                  $isi = 0;
                                                  foreach ($data as $key => $value) {
                                                    $jml_bed_sk = $jml_bed_sk + $value->bed_sk;
                                                    $isi = $isi +  $value->ISI;
                                                  }
                                                  
                                                  #tanggal 20-09-2018 set manual qty
                                                  $manual = 585;
                                                  //$jml_bed_sk
                                                  $p = (($isi/$jml_bed_sk)*100);
                                                ?>
                                                 <center>
                                                    <div id="demo-pie-2" class="pie-title-center" data-percent="<?php echo $p; ?>"> <span class="pie-value"></span> </div><br>
                                                    <?php echo round($p,4);  ?>
                                                    <?php  echo '<br><span style="font-size:10px;">'.$isi.'/'.$jml_bed_sk.'</span>'; ?>
                                                 </center>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="cell">
                                            <div class="window">
                                              <div class="window-caption bg-cyan">
                                                <div class="window-caption-title" style="color:#FFF; font-size:20px;border:0px solid #000; width:100%;">
                                                  <center><?php echo $data[4]->NAMA_KELAS ?></span></center>
                                                </div>

                                              </div>
                                              <div class="window-content" style="padding:15px;" >
                                                <center>
                                                  <div style="border:1px solid #1BA1E2;width:110px;height:110px; 
                                                  border-radius:100px;background:#1BA1E2;">
                                                  <div style="margin:auto; padding-top:20px; padding-left:2px;" >
                                                    <b><span style="font-size:55px; color:#FFF;"> 
                                                      <?php 
                                                      // echo ($data[9]['ISI_L'] + $data[9]['ISI_P']) 
                                                      // echo ($data[4]->KOSONG)
                                                      echo ($data[4]->bed_sk - $data[4]->ISI); 
                                                      ?></span> 
                                                    </b>&nbsp;
                                                  </div>

                                                </div>
                                              </center>
                                              <hr>
                                              <center>
                                              <a class="image-button bg-cyan bg-active-amber fg-white icon-right small-button" style="height:45px;">
                                                  <div style="font-size:45px; color:#FFF; padding-top:5px;"><b>
                                                    <?php 
                                                      $array = explode(',', $data[4]->ISI_KELAMIN);
                                                      // print_r($array);
                                                      $counts = array_count_values($array);
                                                      if(!empty($counts['L']))
                                                        echo $counts['L'];
                                                      else
                                                        echo 0;
                                                     ?>
                                                  </b>&nbsp;&nbsp;</div>
                                                  <img class="icon bg-darkCyan" src="<?php echo base_url('assets/img/male.png') ?>" style="height:45px; width:45px;">
                                              </a>
                                              <a class="image-button bg-pink bg-active-amber fg-white icon-right small-button" style="height:45px;">
                                                  <div style="font-size:45px; color:#FFF; padding-top:5px;"><b>
                                                    <?php 
                                                      if(!empty($counts['P']))
                                                        echo $counts['P'];
                                                      else
                                                        echo 0; 
                                                      ?>
                                                  </b>&nbsp;&nbsp;</div>
                                                  <img class="icon bg-darkPink" src="<?php echo base_url('assets/img/female.png') ?>" style="height:45px; width:45px;">
                                              </a>
                                              <!--  
                                                <a class="image-button bg-cyan bg-active-amber fg-white icon-right small-button" style="height:45px;">
                                                  <div style="font-size:45px; color:#FFF; padding-top:5px;"><b><?php //echo ($data[4]->ISI_L) ?></b>&nbsp;&nbsp;</div>
                                                  <img class="icon bg-darkCyan" src="http://192.168.132.4/info/docs/images/male.png" style="height:45px; width:45px;">
                                                </a>
                                                <a class="image-button bg-pink bg-active-amber fg-white icon-right small-button" style="height:45px;">
                                                  <div style="font-size:45px; color:#FFF; padding-top:5px;"><b><?php //echo ($data[4]->ISI_P) ?></b>&nbsp;&nbsp;</div>
                                                  <img class="icon bg-darkPink" src="http://192.168.132.4/info/docs/images/female.png" style="height:45px; width:45px;">
                                                </a>
                                              -->
                                              </center>
                                            </div>
                                          </div>
                                        </div>


                                      </div>

                                    </div>

                                  </div>
                                </div>    
                              </div>
                            </div>

                            <div style="width:100%;background-color:#1BA1E2; padding:10px;">
                              <div style="float:right; background-color:#1BA1E2;">
                                  <span id="tgl" style="color:#FFF;"></span>&nbsp;&nbsp;&nbsp;<span id="clock" style="color:#FFF;"></span> 
                                  <input type="hidden" id="diam" value="0"> 
                                  <span Onclick="fungsi('off')" id="off_span" style="cursor:pointer;">
                                   <img src="<?php echo base_url('assets/img/pause.png') ?>" height="25" width="25" style="padding-bottom:1px;">
                                  </span>
                                  <span Onclick="fungsi('on')" id="on_span" style="cursor:pointer; display:none;">
                                   <img src="<?php echo base_url('assets/img/play.png') ?>" height="28" width="28" style="padding-bottom:0px;">
                                  </span>
                              </div>
                              <div style="clear:both"></div>
                            </div>

                            <!-- LOAD OUR JS -->
                            <?php $this->load->view('welcome/infobed');?>

                            <script type="text/javascript">

                              $(document).ready(function() {
                               setInterval(function() {
                                 var BASEURL = '<?= BASEURL?>';
                                 window.location.href = BASEURL+'/halaman/satu';
                               }, 30000);
                             });

                              $(document).ready(function () {
                                $('#demo-pie-2').pieChart({
                                  barColor: '#8465d4',
                                  trackColor: '#eee',
                                  lineCap: 'butt',
                                  lineWidth: 8,
                                  onStep: function (from, to, percent) {
                                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                                  }
                                });
                              });

                            </script>