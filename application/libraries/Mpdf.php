<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf {

  protected $CI;

  public function method()
  {
    parent::__construct();
    include_once APPATH.'/third_party/MPDF60/mpdf.php';
    ini_set('memory_limit','1024M');
    //Codeigniter : Write Less Do More

    $CI = &get_instance();
    $CI->pdf = new mPDF($param);
    log_message('Debug','mPDF Class Is Loaded');
  }

}
