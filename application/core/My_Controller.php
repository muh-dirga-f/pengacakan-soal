<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_Controller extends CI_Controller
{
  
  function __construct()
  {
    parent::__construct();
    $this->load->helper('my_helper');
  }

}
