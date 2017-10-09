<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_teknisi extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  var $table = 'sc';
  var $column_order = array(null, 'STO','NO_SC','TYPE_TRANSAKSI','ALPRO','POTS','SPEEDY','STATUS_RESUME','ORDER_DATE','NAMA_CUST','ALAMAT','LONGITUDE','LATITUDE','TGL_INSTALL','TEKNISI','HP_TEKNISI','TINDAK_LANJUT','SN_ONT'); //set column field database for datatable orderable
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
          $this->db->where('ALPRO',$row->PD_NAME);
          $query1 = $this->db->get('sc');
          if ($query1->num_rows()>0) {
            foreach ($query1->result() as $key) {
              array_push($sc,$key);
            }
          }
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
  public function get_odc($sto,$name){
    if ($name!=NULL){
      $this->db->where('NAME', $name);
    }
    $this->db->where('STO', $sto);
    $query = $this->db->get('alpro_odc');
    return $query->result();
  }
  public function get_teknisi($username){
    $this->db->where('USERNAME', $username);
    $query = $this->db->get('teknisi');
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
  function count_filtered(){
      $this->_get_datatables_query();
      $query = $this->db->get();
      return $query->num_rows();
  }
  private function _get_datatables_query(){
      if ($this->input->post('type')!='all') {
        $sc=$this->input->post('sc');
        $where='ALPRO= "'.$sc[0].'"';
        for ($i=1; $i <sizeof($sc) ; $i++) {
          $where.='OR ALPRO= "'.$sc[i].'"';
        }
        $this->db->where($where);
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
}
