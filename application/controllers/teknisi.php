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
    if (sizeof($data['odp'])>0) {
      $data['sc'] = $this->M_teknisi->get_sc($data['odp']);
    }
    else {
      $data['sc'] = [];
    }
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
      if ($this->session->userdata('role')!='TEKNISI') {
        if ($key->STATUS_RESUME=='PI Ready') {
          $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Assign" onclick="assign_teknisi('."'".$key->NO_SC."'".')">Assign Teknisi</a>
                  <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pi('."'".$key->NO_SC."'".')">Edit PI</a>';
        }
        else if ($key->STATUS_RESUME=='PI Progress') {
          $row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Cancel" onclick="calcel_assign_teknisi('."'".$key->NO_SC."'".')">Cancel</a>
          <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pi('."'".$key->NO_SC."'".')">Edit PI</a>';
        }
        else {
          $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pi('."'".$key->NO_SC."'".')">Edit PI</a>';
        }
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
      if ($this->session->userdata('role')!='TEKNISI') {
        if ($key->STATUS_RESUME=='PI Ready') {
          $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Assign" onclick="assign_teknisi('."'".$key->NO_SC."'".')">Assign Teknisi</a>
                  <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pi('."'".$key->NO_SC."'".')">Edit PI</a>';
        }
        else if ($key->STATUS_RESUME=='PI Progress') {
          $row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Cancel" onclick="calcel_assign_teknisi('."'".$key->NO_SC."'".')">Cancel</a>
          <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pi('."'".$key->NO_SC."'".')">Edit PI</a>';
        }
        else {
          $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pi('."'".$key->NO_SC."'".')">Edit PI</a>';
        }
      }


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
  public function ajax_get_summary(){
    $list = $this->M_teknisi->get_datatables_pi();
    $data = array();
    $temp = array(
      array('STO' =>'SMY', 'READY' =>0, 'PROGRESS'=>0, 'ACCOM'=>0, 'KENDALA'=>0),
      array('STO' =>'SAU', 'READY' =>0, 'PROGRESS'=>0, 'ACCOM'=>0, 'KENDALA'=>0),
      array('STO' =>'BNO', 'READY' =>0, 'PROGRESS'=>0, 'ACCOM'=>0, 'KENDALA'=>0),
      array('STO' =>'JBR', 'READY' =>0, 'PROGRESS'=>0, 'ACCOM'=>0, 'KENDALA'=>0),
      array('STO' =>'KLM', 'READY' =>0, 'PROGRESS'=>0, 'ACCOM'=>0, 'KENDALA'=>0),
      array('STO' =>'KUT', 'READY' =>0, 'PROGRESS'=>0, 'ACCOM'=>0, 'KENDALA'=>0),
      array('STO' =>'MMN', 'READY' =>0, 'PROGRESS'=>0, 'ACCOM'=>0, 'KENDALA'=>0),
      array('STO' =>'NDA', 'READY' =>0, 'PROGRESS'=>0, 'ACCOM'=>0, 'KENDALA'=>0),
      array('STO' =>'SWI', 'READY' =>0, 'PROGRESS'=>0, 'ACCOM'=>0, 'KENDALA'=>0),
      array('STO' =>'TOP', 'READY' =>0, 'PROGRESS'=>0, 'ACCOM'=>0, 'KENDALA'=>0),
      array('STO' =>'UBN', 'READY' =>0, 'PROGRESS'=>0, 'ACCOM'=>0, 'KENDALA'=>0),
    );
    $status=array('READY','PROGRESS','ACCOM','KENDALA');
    foreach ($list as $key) {
      if ($key->STO=='SMY') {
        if ($key->STATUS_RESUME=='PI Ready') $temp[0]['READY']++;
        if ($key->STATUS_RESUME=='PI Progress') $temp[0]['PROGRESS']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[0]['ACCOM']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[0]['KENDALA']++;
      }
      else if ($key->STO=='SAU') {
        if ($key->STATUS_RESUME=='PI Ready') $temp[1]['READY']++;
        if ($key->STATUS_RESUME=='PI Progress') $temp[1]['PROGRESS']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[1]['ACCOM']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[1]['KENDALA']++;
      }
      else if ($key->STO=='BNO') {
        if ($key->STATUS_RESUME=='PI Ready') $temp[2]['READY']++;
        if ($key->STATUS_RESUME=='PI Progress') $temp[2]['PROGRESS']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[2]['ACCOM']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[2]['KENDALA']++;
      }
      else if ($key->STO=='JBR') {
        if ($key->STATUS_RESUME=='PI Ready') $temp[3]['READY']++;
        if ($key->STATUS_RESUME=='PI Progress') $temp[3]['PROGRESS']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[3]['ACCOM']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[3]['KENDALA']++;
      }
      else if ($key->STO=='KLM') {
        if ($key->STATUS_RESUME=='PI Ready') $temp[4]['READY']++;
        if ($key->STATUS_RESUME=='PI Progress') $temp[4]['PROGRESS']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[4]['ACCOM']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[4]['KENDALA']++;
      }
      else if ($key->STO=='KUT') {
        if ($key->STATUS_RESUME=='PI Ready') $temp[5]['READY']++;
        if ($key->STATUS_RESUME=='PI Progress') $temp[5]['PROGRESS']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[5]['ACCOM']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[5]['KENDALA']++;
      }
      else if ($key->STO=='MMN') {
        if ($key->STATUS_RESUME=='PI Ready') $temp[6]['READY']++;
        if ($key->STATUS_RESUME=='PI Progress') $temp[6]['PROGRESS']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[6]['ACCOM']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[6]['KENDALA']++;
      }
      else if ($key->STO=='NDA') {
        if ($key->STATUS_RESUME=='PI Ready') $temp[7]['READY']++;
        if ($key->STATUS_RESUME=='PI Progress') $temp[7]['PROGRESS']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[7]['ACCOM']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[7]['KENDALA']++;
      }
      else if ($key->STO=='SWI') {
        if ($key->STATUS_RESUME=='PI Ready') $temp[8]['READY']++;
        if ($key->STATUS_RESUME=='PI Progress') $temp[8]['PROGRESS']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[8]['ACCOM']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[8]['KENDALA']++;
      }
      else if ($key->STO=='TOP') {
        if ($key->STATUS_RESUME=='PI Ready') $temp[9]['READY']++;
        if ($key->STATUS_RESUME=='PI Progress') $temp[9]['PROGRESS']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[9]['ACCOM']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[9]['KENDALA']++;
      }
      else if ($key->STO=='UBN') {
        if ($key->STATUS_RESUME=='PI Ready') $temp[10]['READY']++;
        if ($key->STATUS_RESUME=='PI Progress') $temp[10]['PROGRESS']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[10]['ACCOM']++;
        if ($key->STATUS_RESUME=='PI ACCOM') $temp[10]['KENDALA']++;
      }
    }
    $no = $_POST['start'];
    for ($i=0; $i < 11; $i++) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $temp[$i]['STO'];
      $row[] = '<a onclick="show_data_table_pi('."'".$status[0]."'".','."'".$temp[$i]['STO']."'".');">'.$temp[$i]['READY'].'</a>';
      $row[] = '<a onclick="show_data_table_pi('."'".$status[1]."'".','."'".$temp[$i]['STO']."'".');">'.$temp[$i]['PROGRESS'].'</a>';
      $row[] = '<a onclick="show_data_table_pi('."'".$status[2]."'".','."'".$temp[$i]['STO']."'".');">'.$temp[$i]['ACCOM'].'</a>';
      $row[] = '<a onclick="show_data_table_pi('."'".$status[3]."'".','."'".$temp[$i]['STO']."'".');">'.$temp[$i]['KENDALA'].'</a>';

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
  public function ajax_get_nearest(){
    $data = $this->M_teknisi->get_odc(null,null);
    $temp = array();
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
      $temp['odp'][$i] = $this->M_teknisi->get_odp_nearest($odc[$i]['LATITUDE'],$odc[$i]['LONGITUDE']);
      $temp['sc'][$i] = $this->M_teknisi->get_sc_pi($temp['odp'][$i]);
      if ($temp['sc'][$i]) {
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
  public function ajax_get_nearest_teknisi(){
    $data = $this->M_teknisi->get_odc(null,null);
    $odc=array();
    $temp = array();
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
      $temp['odp'][$i] = $this->M_teknisi->get_odp_nearest($odc[$i]['LATITUDE'],$odc[$i]['LONGITUDE']);
      $temp['sc'][$i] = $this->M_teknisi->get_sc_pi($temp['odp'][$i]);
      if (sizeof($temp['sc'][$i])==0) {
        $temp['teknisi'][$i] = $this->M_teknisi->get_teknisi_by_cluster($odc[$i]['STO'],$odc[$i]['NAME']);
        if ($temp['teknisi'][$i]) {
          $status=true;
          $teknisi=array();
          array_push($teknisi,$temp['teknisi'][$i]);
        }
      }
      $i++;
    }
    echo json_encode($teknisi);
  }
  public function ajax_do_sc(){
    echo json_encode($this->M_teknisi->do_sc());
  }
  public function ajax_assign_teknisi(){
    echo json_encode($this->M_teknisi->assign_teknisi());
  }
  public function ajax_upload_jadwal(){
    echo json_encode($this->M_teknisi->upload_jadwal_csv());
  }
  public function ajax_tambah_pi(){
    echo json_encode($this->M_teknisi->tambah_pi_csv());
  }
  public function ajax_update_pi(){
    echo json_encode($this->M_teknisi->update_pi_csv());
  }
  public function ajax_upload_cluster(){
    echo json_encode($this->M_teknisi->upload_cluster_csv());
  }
  public function ajax_upload_teknisi(){
    echo json_encode($this->M_teknisi->upload_teknisi_csv());
  }
  public function ajax_cancel_assign_teknisi(){
    echo json_encode($this->M_teknisi->cancel_assign_teknisi());
  }
  public function ajax_edit_pi(){
    echo json_encode($this->M_teknisi->edit_pi());
  }
  public function ajax_submit_edit_pi(){
    echo json_encode($this->M_teknisi->submit_edit_pi());
  }
}
