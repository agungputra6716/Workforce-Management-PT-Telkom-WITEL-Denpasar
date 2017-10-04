<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_admin');
  }

  function index()
  {
    $this->load->view('v_admin');
  }

}
