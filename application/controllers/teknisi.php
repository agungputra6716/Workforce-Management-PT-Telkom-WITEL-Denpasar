<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Teknisi extends CI_Controller{

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
    $data['odp'] = $this->M_teknisi->get_odp();
    $data['sc'] = $this->M_teknisi->get_sc($data['odp']);
    echo json_encode($data);
  }
  public function ajax_get_sc(){
    $data = $this->M_teknisi->get_sc($this->input->post('pd_name'));
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
