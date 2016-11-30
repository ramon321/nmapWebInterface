<?php
    function asset($asset = '')
    {
        return base_url("assets/$asset");
    }
    function get_flash_error()
    {
        $CI =& get_instance();
        $CI->load->library('session');
        return $CI->session->flashdata('error');
    }
?>