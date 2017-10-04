<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_maps');
    //Codeigniter : Write Less Do More
  }

  public function index()
  {
    $this->load->view('welcome');
  }

  public function add_location()
  {
    $data=array(
      'nama'=>$this->input->post('add_nama'),
      'keterangan' =>$this->input->post('add_keterangan'),
      'latitude'=>$this->input->post('add_lat'),
      'longitude'=>$this->input->post('add_long'),
    );
    $result = $this->M_maps->add_location($data);
    echo json_encode($result);
  }

  public function edit_location()
  {
    $data=array(
      'nama'=>$this->input->post('nama'),
      'keterangan' =>$this->input->post('keterangan'),
      'latitude'=>$this->input->post('lat'),
      'longitude'=>$this->input->post('long'),
    );
    $result = $this->M_maps->edit_location($data);
    echo json_encode($result);
  }

  public function get_location()
  {
    $data = $this->M_maps->get_location($this->input->post('alpro'));
    echo json_encode($data);
  }

  public function delete_location()
  {
    $data=array(
      'nama'=>$this->input->post('nama'),
      'keterangan' =>$this->input->post('keterangan'),
      'latitude'=>$this->input->post('lat'),
      'longitude'=>$this->input->post('long'),
    );
    $result = $this->M_maps->delete_location();
    echo json_encode($result);
  }
}
