<?php

if (!function_exists('waktu_indo')) {

    function waktu_indo()
    {
        date_default_timezone_set('Asia/Jakarta');
        return date('d-m-Y H:i:s');
    }
}
