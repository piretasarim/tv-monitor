    /*
     * ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
     *  CARA MANGGIL FILE INI DI VIEWS:
     *  1. <?= include APPPATH."views/var_js.php"; ?> (Buat yang gak pake master_controller()) di paling atas. *kata mastah mas aris....
     *  2. <?= script_tag('assets/js/media/akunting/modul.js'); ?>
     * //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     */

     $('#tgl1').datepicker({"format": "dd-mm-yyyy", "weekStart": 1, "autoclose": true});
     $('#tgl2').datepicker({"format": "dd-mm-yyyy", "weekStart": 1, "autoclose": true});