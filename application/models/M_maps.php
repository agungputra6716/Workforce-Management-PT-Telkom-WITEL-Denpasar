<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_maps extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_location($alpro)
  {
    $marker=array();
    if ($alpro=='ODC') {
      $table='alpro_odc';
    }
    elseif ($alpro=='ODP') {
      $table='alpro_odp';
    }
    $query = $this->db->get($table);
    foreach ($query->result() as $key) {
      array_push($marker,$key);
    }
    return $marker;
  }

  function add_location($data)
  {
    $this->db->insert('map_location',$data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  function edit_location($data)
  {
    $this->db->where('nama',$this->input->post('nama'));
    $this->db->update('map_location',$data);
    return $this->db->affected_rows();
  }

  function delete_location()
  {
    $this->db->where('nama',$this->input->post('nama'));
    $this->db->delete('map_location');
    return $this->db->affected_rows();
  }
}
