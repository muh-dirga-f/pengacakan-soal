<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends My_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data = [
      'navbar' => 'dashboard',
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('admin/dashboard', $data);
    $this->load->view('templates/footer');
  }

  public function mahasiswa()
  {
    $data = [
      'judul' => 'Data Mahasiswa',
      'navbar' => 'mahasiswa',
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('admin/mahasiswa', $data);
    $this->load->view('templates/footer');
  }

  public function dosen()
  {
    $data = [
      'judul' => 'Data Dosen',
      'navbar' => 'dosen',
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('admin/dosen', $data);
    $this->load->view('templates/footer');
  }

  public function kelas()
  {
    $data = [
      'judul' => 'Data Kelas',
      'navbar' => 'kelas',
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('admin/kelas', $data);
    $this->load->view('templates/footer');
  }
  
  public function matkul()
  {
    $data = [
      'judul' => 'Data Mata Kuliah',
      'navbar' => 'matkul',
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('admin/matkul', $data);
    $this->load->view('templates/footer');
  }

  public function matkulampuh()
  {
    $data = [
      'judul' => 'Data Mata Kuliah Ampuh',
      'navbar' => 'matkulampuh',
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('admin/matkulampuh', $data);
    $this->load->view('templates/footer');
  }

  public function soal()
  {
    $data = [
      'judul' => 'Data Soal',
      'navbar' => 'soal',
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('admin/soal', $data);
    $this->load->view('templates/footer');
  }

  public function acaksoal()
  {
    $data = [
      'judul' => 'Data Acak Soal',
      'navbar' => 'acaksoal',
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('admin/acaksoal', $data);
    $this->load->view('templates/footer');
  }
}
