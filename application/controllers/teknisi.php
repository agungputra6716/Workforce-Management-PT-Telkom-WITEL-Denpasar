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
  public function ajax_get_sc_by_no(){
    $data = $this->M_teknisi->get_sc_by_no($this->input->post('no_sc'));
    echo json_encode($data);
  }
  public function ajax_get_teknisi(){
    $data = $this->M_teknisi->get_teknisi($this->input->post('username'));
    echo json_encode($data);
  }
  public function ajax_get_avail_teknisi(){
    $data = $this->M_teknisi->get_avail_teknisi();
    echo json_encode($data);
  }
  public function ajax_list(){
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
      $row[] = $key->SPEEDY;
      $row[] = $key->STATUS_RESUME;
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
      if (($this->session->userdata('role')=='HELP DESK')&&($key->STATUS_RESUME=='PI Ready')) {
        $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Assign" onclick="assign_teknisi('."'".$key->NO_SC."'".')"><i class="glyphicon glyphicon-pencil"></i> Assign Teknisi</a>';
      }

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
  public function ajax_list_pi(){
    $list = $this->M_teknisi->get_datatables_pi();
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
      $row[] = $key->SPEEDY;
      $row[] = $key->STATUS_RESUME;
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
      $row[] = '';


      $data[] = $row;
    }

    $output = array(
                    "draw" => $_POST['draw'],
                    "recordsTotal" => $this->M_teknisi->count_all(),
                    "recordsFiltered" => $this->M_teknisi->count_filtered_pi(),
                    "data" => $data,
                  );
    //output to json format
    echo json_encode($output);
  }
  public function ajax_get_inbox(){
    $list = $this->M_teknisi->get_inbox();
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
      $row[] = $key->SPEEDY;
      $row[] = $key->STATUS_RESUME;
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
      $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="get_here" onclick="do_sc('."'".$key->NO_SC."'".')"><i class="glyphicon glyphicon-pencil"></i> Get Here</a>';

      $data[] = $row;
    }

    $output = array(
                    "draw" => $_POST['draw'],
                    "recordsTotal" => $this->M_teknisi->count_all(),
                    "recordsFiltered" => $this->M_teknisi->count_filtered_inbox(),
                    "data" => $data,
                  );
    //output to json format
    echo json_encode($output);
  }
  public function ajax_get_nearest(){
    $data = $this->M_teknisi->get_odc(null,null);
    $odc=array();
    $lat1=$this->input->post('lat');
    $lng1=$this->input->post('lng');
    foreach ($data as $key) {
      $row=array();
      $lat2=$key->LATITUDE;
      $lng2=$key->LONGITUDE;

      $row['DISTANCE']=$this->M_teknisi->distance($lat1,$lng1,$lat2,$lng2);
      $row['STO']=$key->STO;
      $row['NAME']=$key->NAME;
      $row['LATITUDE']=$key->LATITUDE;
      $row['LONGITUDE']=$key->LONGITUDE;
      $row['ALAMAT']=$key->ALAMAT;

      array_push($odc,$row);
    }
    sort($odc);
    $status=false;
    $i=1;
    while($status==false){
      $data['odp'][$i] = $this->M_teknisi->get_odp_nearest($odc[$i]['LATITUDE'],$odc[$i]['LONGITUDE']);
      $data['sc'][$i] = $this->M_teknisi->get_sc($data['odp'][$i]);
      if ($data['sc'][$i]) {
        $status=true;
        $nearest=[
          'LATITUDE'=>$odc[$i]['LATITUDE'],
          'LONGITUDE'=>$odc[$i]['LONGITUDE'],
          'STO'=>$odc[$i]['STO'],
          'NAME'=>$odc[$i]['NAME'],
          'ALAMAT'=>$odc[$i]['ALAMAT']
        ];
      }
      $i++;
    }
    echo json_encode($nearest);
  }
  public function ajax_do_sc(){
    echo json_encode($this->M_teknisi->do_sc());
  }
  public function ajax_assign_teknisi(){
    echo json_encode($this->M_teknisi->assign_teknisi());
  }
}
