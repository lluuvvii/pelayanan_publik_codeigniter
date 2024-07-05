<?php
class Check_login
{

  public function check()
  {
    $CI =& get_instance();
    $CI->load->library('session');

    if (!$CI->session->userdata('logged_in')) {
      redirect('users/login');
    }
  }
}
