<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Teknisi extends CI_Controller{
  var $table = 'sc';
  var $column_order = array(null, 'STO','NO SC','TYPE TRANSAKSI','ALPRO','POTS','SPEEDY','STATUS RESUME','ORDER DATE','NAMA CUST','ALAMAT','LONGITUDE','LATITUDE','TGL INSTALL','TEKNISI','HP TEKNISI','TINDAK LANJUT','SN ONT'); //set column field database for datatable orderable
  var $column_search = array('STO','NO SC','TYPE TRANSAKSI','ALPRO','POTS','SPEEDY','STATUS RESUME','ORDER DATE','NAMA CUST','ALAMAT','LONGITUDE','LATITUDE','TGL INSTALL','TEKNISI','HP TEKNISI','TINDAK LANJUT','SN ONT'); //set column field database for datatable searchable
  var $order = array('id' => 'asc'); // default order


  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_teknisi');
    //Codeigniter : Write Less Do More
  }

  public function ajax_get_sto(){
    $data = $this->M_teknisi->get_sto();
    echo json_encode($data);
  }
  public function ajax_get_odc(){
    $data = $this->M_teknisi->get_odc($this->input->post('sto'),$this->input->post('name'));
    echo json_encode($data);
  }
  public function ajax_get_odp(){
    $data = $this->M_teknisi->get_odp();
    echo json_encode($data);
  }
  public function ajax_get_sc(){
    $data = $this->M_teknisi->get_sc();
    echo json_encode($data);
  }
  public function ajax_get_teknisi(){
    $data = $this->M_teknisi->get_teknisi($this->input->post('username'));
    echo json_encode($data);
  }
  public function ajax_list()
    {
      $list = $this->M_teknisi->get_datatables();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $key) {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] = $key->STO;
        $row[] = $key->NO_SC;
        $row[] = $key->TYPE_TRANSAKSI;
        $row[] = $key->ALPRO;
        $row[] = $key->POTS;
        $row[] = $key->STATUS_RESUME;
        $row[] = $key->SPEEDY;
        $row[] = $key->ORDER_DATE;
        $row[] = $key->NAMA_CUST;
        $row[] = $key->ALAMAT;
        $row[] = $key->LONGITUDE;
        $row[] = $key->LATITUDE;
        $row[] = $key->TGL_INSTALL;
        $row[] = $key->TEKNISI;
        $row[] = $key->HP_TEKNISI;
        $row[] = $key->TINDAK_LANJUT;
        $row[] = $key->SN_ONT;

        $data[] = $row;
      }

      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->M_teknisi->count_all(),
                      "recordsFiltered" => $this->M_teknisi->count_filtered(),
                      "data" => $data,
                    );
      //output to json format
      echo json_encode($output);
    }


}
