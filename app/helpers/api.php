<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('cekRM')) {
    function cekRM($no_rm){
        $last_number = substr(($no_rm), -2); //exit(var_dump((int)$last_number));

        $rak1 = in_range((int)$last_number, 0, 9, TRUE);
        $rak2 = in_range((int)$last_number, 10, 19, TRUE);
        $rak3 = in_range((int)$last_number, 20, 29, TRUE);

        if ($rak) {
            # code...
        }
    }
}