<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('has_session'))
{
    function has_session()
    {
        $ci =& get_instance();
        if (!($ci->session->userdata('logged_in') == true)) {
            redirect('user/signin');
        }
    }
}

