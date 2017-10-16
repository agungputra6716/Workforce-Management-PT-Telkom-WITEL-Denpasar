<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_teknisi extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  var $table = 'sc';
  var $column_order = array(null,'STO','NO_SC','TYPE_TRANSAKSI','ALPRO','POTS','SPEEDY','STATUS_RESUME','ORDER_DATE','NAMA_CUST','ALAMAT','LONGITUDE','LATITUDE','TGL_INSTALL','TEKNISI','HP_TEKNISI','TINDAK_LANJUT','SN_ONT',null); //set column field database for datatable orderable
  var $column_search = array('STO','NO_SC','TYPE_TRANSAKSI','ALPRO','POTS','SPEEDY','STATUS_RESUME','ORDER_DATE','NAMA_CUST','ALAMAT','LONGITUDE','LATITUDE','TGL_INSTALL','TEKNISI','HP_TEKNISI','TINDAK_LANJUT','SN_ONT'); //set column field database for datatable searchable
  var $order = array('STO' => 'asc'); // default order

  public function get_sto(){
    $this->db->distinct();
    $this->db->select('STO');
    $query = $this->db->get('alpro_odc');
    return $query->result();
  }
  public function get_odp(){
    $query = $this->db->get('alpro_odp');
    $lat2=$this->input->post('lat');
    $lon2=$this->input->post('lng');
    $odp=array();
    $sc=array();
    if ($query->num_rows()>0) {
      foreach ($query->result() as $row) {
        $lat1=$row->LATITUDE;
        $lon1=$row->LONGITUDE;
        if ($this->distance($lat1,$lon1,$lat2,$lon2)<=0.5) {
          array_push($odp,$row);
        }
      }
    }
    return $odp;
  }
  public function get_sc($pd_name){
    if ($pd_name) {
      $sc = array();
      for ($i=0; $i <sizeof($pd_name) ; $i++) {
        $this->db->where('ALPRO',$pd_name[$i]->PD_NAME);
        $query = $this->db->get('sc');
        foreach ($query->result() as $result) {
          array_push($sc,$result);
        }
      }
    }
    else {
      $query = $this->db->get('sc');
      $sc=$query->result();
    }
    return $sc;
  }
  public function get_sc_by_no($no_sc){
    $this->db->where('NO_SC', $no_sc);
    $query = $this->db->get('sc');
    return $query->result();
  }
  public function get_odc($sto,$name){
    if ($name!=NULL){
      $this->db->where('NAME', $name);
    }
    if ($sto!=NULL) {
      $this->db->where('STO', $sto);
    }
    $query = $this->db->get('alpro_odc');
    $odc=array();
    foreach ($query->result() as $key) {
      array_push($odc,$key);
    }
    return $odc;
  }
  public function get_odp_nearest($lat2,$lng2){
    $query = $this->db->get('alpro_odp');
    $odp=array();
    $sc=array();
    if ($query->num_rows()>0) {
      foreach ($query->result() as $row) {
        $lat1=$row->LATITUDE;
        $lng1=$row->LONGITUDE;
        if ($this->distance($lat1,$lng1,$lat2,$lng2)<=0.5) {
          array_push($odp,$row);
        }
      }
    }
    return $odp;
  }
  public function get_teknisi($username){
    $this->db->where('USERNAME', $username);
    $query = $this->db->get('user');
    return $query->result();
  }
  public function get_avail_teknisi(){
    $this->db->where('STO', $this->input->post('STO'));
    $this->db->where('CLUSTER', $this->input->post('CLUSTER'));
    $this->db->where('STATUS', 'IDLE');
    $this->db->where('TGL_KERJA', date('d-m-Y'));
    $query = $this->db->get('jadwal');
    return $query->result();
  }
  public function distance($lat1, $lon1, $lat2, $lon2) {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $kilo = $dist * 60 * 1.1515 * 1.609344;
    return $kilo;
  }
  public function count_all(){
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }
  function get_datatables(){
    $this->_get_datatables_query();
    if($_POST['length'] != -1)
    $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }
  function get_datatables_pi(){
    $this->_get_datatables_pi_query();
    if($_POST['length'] != -1)
    $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }
  function get_inbox(){
    $this->_get_datatables_query_inbox();
    if($_POST['length'] != -1)
    $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }
  function count_filtered(){
    $this->_get_datatables_query();
    $query = $this->db->get();
    return $query->num_rows();
  }
  function count_filtered_pi(){
    $this->_get_datatables_pi_query();
    $query = $this->db->get();
    return $query->num_rows();
  }
  function count_filtered_inbox(){
    $this->_get_datatables_query_inbox();
    $query = $this->db->get();
    return $query->num_rows();
  }
  private function _get_datatables_query(){
    if ($this->input->post('type')!='all') {
      $sc=$this->input->post('sc');
      if (sizeof($sc)==1) $where='ALPRO = "'.$sc[0].'" ';
      else $where='(ALPRO = "'.$sc[0].'" ';

      for ($i=1; $i <sizeof($sc) ; $i++) {
        if ($i==(sizeof($sc)-1)) $where.='OR ALPRO = "'.$sc[$i].'")';
        else $where.='OR ALPRO = "'.$sc[$i].'" ';
      }
      $this->db->where($where);
      if ($this->input->post('type')=='READY') {
        $this->db->where('STATUS_RESUME','PI Ready');
      }
      else if($this->input->post('type')=='ACCOM'){
        $this->db->where('STATUS_RESUME','PI ACCOM');
      }
      else if($this->input->post('type')=='KENDALA'){
        $this->db->where('STATUS_RESUME','PI Kendala');
      }
      else if($this->input->post('type')=='PROGRESS'){
        $this->db->where('STATUS_RESUME','PI Progress');
      }
    }
    else {
      $this->db->where('STATUS_RESUME','PI ACCOM');
    }
    $this->db->from($this->table);

    $i = 0;

    foreach ($this->column_search as $item) // loop column
    {
        if($_POST['search']['value']) // if datatable send POST for search
        {

            if($i===0) // first loop
            {
                $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                $this->db->like($item, $_POST['search']['value']);
            }
            else
            {
                $this->db->or_like($item, $_POST['search']['value']);
            }

            if(count($this->column_search) - 1 == $i) //last loop
                $this->db->group_end(); //close bracket
        }
        $i++;
    }

    if(isset($_POST['order'])) // here order processing
    {
        $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    }
    else if(isset($this->order))
    {
        $order = $this->order;
        $this->db->order_by(key($order), $order[key($order)]);
    }
  }
  private function _get_datatables_pi_query(){
    if ($this->input->post('sto')!='ALL') {
      $this->db->where('STO', $this->input->post('sto'));
    }
    if ($this->input->post('type')=='READY') {
      $this->db->where('STATUS_RESUME','PI Ready');
    }
    else if($this->input->post('type')=='ACCOM'){
      $this->db->where('STATUS_RESUME','PI ACCOM');
    }
    else if($this->input->post('type')=='KENDALA'){
      $this->db->where('STATUS_RESUME','PI Kendala');
    }
    else if($this->input->post('type')=='PROGRESS'){
      $this->db->where('STATUS_RESUME','PI Progress');
    }

    $this->db->from($this->table);

    $i = 0;

    foreach ($this->column_search as $item) // loop column
    {
        if($_POST['search']['value']) // if datatable send POST for search
        {

            if($i===0) // first loop
            {
                $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                $this->db->like($item, $_POST['search']['value']);
            }
            else
            {
                $this->db->or_like($item, $_POST['search']['value']);
            }

            if(count($this->column_search) - 1 == $i) //last loop
                $this->db->group_end(); //close bracket
        }
        $i++;
    }

    if(isset($_POST['order'])) // here order processing
    {
        $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    }
    else if(isset($this->order))
    {
        $order = $this->order;
        $this->db->order_by(key($order), $order[key($order)]);
    }
  }
  private function _get_datatables_query_inbox(){
    $this->db->where('TEKNISI', $this->session->userdata('nama'));
    $this->db->where('STATUS_RESUME', 'PI Progress');
    $this->db->from($this->table);
    $i = 0;

    foreach ($this->column_search as $item) // loop column
    {
        if($_POST['search']['value']) // if datatable send POST for search
        {
            if($i===0) // first loop
            {
                $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                $this->db->like($item, $_POST['search']['value']);
            }
            else
            {
                $this->db->or_like($item, $_POST['search']['value']);
            }

            if(count($this->column_search) - 1 == $i) //last loop
                $this->db->group_end(); //close bracket
        }
        $i++;
    }

    if(isset($_POST['order'])) // here order processing
    {
        $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    }
    else if(isset($this->order))
    {
        $order = $this->order;
        $this->db->order_by(key($order), $order[key($order)]);
    }
  }
  public function do_sc(){
    $data=array(
      'STATUS'=>'BUSY'
    );
    $this->db->where('USERNAME', $this->session->userdata('username'));
    $this->db->where('TGL_KERJA', date('d-m-Y'));
    $this->db->update('jadwal',$data);

    $data=array(
      "STATUS_RESUME"=>'PI ACCOM',
      "TGL_INSTALL"=>$this->input->post('TANGGAL_INSTALL'),
      "TEKNISI"=>$this->input->post('TEKNISI'),
      "HP_TEKNISI"=>$this->input->post('HP_TEKNISI'),
      "TINDAK_LANJUT"=>$this->input->post('TINDAK_LANJUT'),
      "SN_ONT"=>$this->input->post('SN_ONT')
    );
    $this->db->where('NO_SC', $this->input->post('NO_SC'));
    $this->db->update('sc', $data);
    return $this->db->affected_rows();
  }
  public function assign_teknisi(){
    $data=array(
      'STATUS_RESUME'=>'PI Progress',
      'TEKNISI'=>$this->input->post('NAME_TEKNISI'),
      'HP_TEKNISI'=>$this->input->post('HP_TEKNISI')
    );
    $this->db->where('NO_SC', $this->input->post('NO_SC_SC'));
    $this->db->update('sc',$data);
    //
    // $data=array(
    //   'USERNAME'=>$this->input->post('select_teknisi'),
    //   'NAME'=>$this->input->post('NAME_TEKNISI'),
    //   'NO_SC'=> $this->input->post('NO_SC_SC'),
    //   'STATUS'=> 'ON PROGRESS',
    // );
    // $this->db->insert('job', $data);

    $data=array(
      'STATUS'=>'BUSY'
    );
    $this->db->where('USERNAME', $this->input->post('select_teknisi'));
    $this->db->where('TGL_KERJA', date('d-m-Y'));
    $this->db->update('jadwal',$data);
    return true;
  }
}
