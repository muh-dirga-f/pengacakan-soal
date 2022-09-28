<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends My_Controller
{
  
  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('login');
  }
}
